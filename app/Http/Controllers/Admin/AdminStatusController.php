<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Status;
use App\Models\AdminStatus;
use App\Models\AdminStatusDetail;
use App\Models\Post;
use App\Models\PostGallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;
use auth;

class AdminStatusController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }


    public function button($id)
    {

        $query['data'] = Admin::findOrFail($id);
        return view('admin/admin/status/button', $query);
    }

    public function datatable(Request $request, $id)
    {
        $data = AdminStatus::where('admin_id', $id)->orderBy('id', 'desc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('id', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->id . '</span>';
                return $category;
            })
            ->editColumn('name', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $category;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = '';
                $actions .= ' <a href="' . url("admin/show-status-detail/" . $row->id) . '" class="btn btn-icon btn-light-warning"><i class="bi bi-eye-fill"></i> </a>';
                
                if(Auth::user()->can('نسخ حالة ادارية')){
                    $actions .= ' <a href="' . url("admin/send-status-mail/" . $row->id) . '" class="btn btn-icon btn-light-dark"><i class="bi bi-menu-up"></i> </a>';
                }
                
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'created_at', 'id'])
            ->make();

    }

    public function create($id)
    {
        $query['data'] = Admin::findOrFail($id);

        return view('admin.post_image.create', $query);
    }

    public function store(Request $request)
    {
        $rule = [
            'admin_id' => 'required',
            'status_id' => 'required',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $status = Status::find($request->status_id);

        $data = AdminStatus::create([
            'admin_id' => $request->admin_id,
            'status_id' => $request->status_id,
            'name' => $status->name,

        ]);
        
        $admin = Admin::findOrFail($request->admin_id); 

        $this->savLog(Auth::user()->id, Auth::user()->name, $data->id, $admin->name, $admin->category->name, "حالة ادارية", Carbon::now() , NULL, NULL, 0,  "اضافة حالة ادارية ".$status->name  );

        return redirect('admin/show-admin/' . $request->admin_id)
            ->with('message', 'تم الاضافة بنجاح')
            ->with('status', 'success');
    }


    public function destroy(Request $request)
    {
        $adminStatus = AdminStatus::whereIn('id', $request->id)->get();

        try {

            foreach ($adminStatus as $key => $item) {
                $status = Status::find($item->status_id);
                $admin = Admin::findOrFail($item->admin_id);

                $categories = AdminStatus::where('id', $item->id)->delete();
                $this->savLog(Auth::user()->id, Auth::user()->name, $item->id, $admin->name, $admin->category->name, "حالة ادارية", Carbon::now() , NULL, NULL, 0,  "حذف حالة ادارية ".$status->name  );
            }

        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = AdminStatus::find($id);
        if ($query['data']) {
            return view('admin/admin/status/show', $query);
        } else {
            return redirect()->back()->with('message', "عفوا تم حذف الحالة")->with('status', 'error');
        }
    }

    public function SendMail($id)
    {
        $query['data'] = AdminStatus::find($id);
        // dd($query['data']['status_id']);
        if ($query['data']) {
            $query['status'] = Status::find($query['data']['status_id']);
            $query['admin'] = Admin::findOrFail($query['data']['admin_id']);

            return view('admin.admin.status.mail', $query);
        } else {
            return redirect()->back()->with('message', "عفوا تم حذف الحالة")->with('status', 'error');
        }

    }

    public function storeDetail(Request $request)
    {
        $rule = [
            'admin_status_id' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        if(is_file($request->photo)){
        $photo = $request->photo;
        } else {
        $photo = NULL;
        }

        $data = AdminStatusDetail::create([
            'admin_status_id' => $request->admin_status_id,
            'note' => $request->note,
            'photo' => $photo,

        ]);
        
        return redirect('admin/show-status-detail/' . $request->admin_status_id)
            ->with('message', 'تم الاضافة بنجاح')
            ->with('status', 'success');
    }

    public function deleteDetail($id)
    {
        try {
            $categories = AdminStatusDetail::where('id', $id)->delete();

        } catch (\Exception $e) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }
        return redirect()->back()->with('message', 'تم الحذف بنجاح')->with('status', 'success');
    }

}
