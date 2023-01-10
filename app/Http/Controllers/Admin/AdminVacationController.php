<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Admin;
use App\Models\AdminVacation;
use App\Models\AdminVacationDetail;
use App\Models\Vacation;
use App\Models\Post;
use App\Models\PostGallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;
use auth;

class AdminVacationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }


    public function button($id)
    {

        $query['data'] = Admin::findOrFail($id);
        return view('admin/admin/vacation/button', $query);
    }

    public function datatable(Request $request, $id)
    {
        $data = AdminVacation::where('admin_id', $id)->orderBy('id', 'asc');
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
            ->editColumn('startdate', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->startdate . '</span>';
                return $category;
            })
            ->editColumn('enddate', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->enddate . '</span>';
                return $category;
            })
            ->editColumn('days', function ($row) {

                $to = Carbon::createFromFormat('Y-m-d H:s:i', $row->enddate);
                $from = Carbon::createFromFormat('Y-m-d H:s:i', $row->startdate);

                $diff_in_days = $to->diffInDays($from);

                $days = '';
                $days .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $diff_in_days . '</span>';
                return $days;
            })
            ->editColumn('actions', function ($row) {
                $actions = '';
                $actions .= ' <a href="' . url("admin/show-vacation-detail/" . $row->id) . '" class="btn btn-icon btn-light-warning"><i class="bi bi-eye-fill"></i> </a>';
                if(Auth::user()->can('نسخ اجازة')){
                    $actions .= ' <a href="' . url("admin/send-vacation-mail/" . $row->id) . '" class="btn btn-icon btn-light-dark"><i class="bi bi-menu-up"></i> </a>';
                }
                
                return $actions;
            })
           
            ->rawColumns(['checkbox', 'days', 'name', 'startdate', 'enddate', 'actions', 'id'])
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
            'vacation_id' => 'required',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $vacation = Vacation::find($request->vacation_id);
        
        $data = AdminVacation::create([
            'admin_id' => $request->admin_id,
            'vacation_id' => $request->vacation_id,
            'name' => $vacation->name,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,

        ]);

        $to = Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:s:i", strtotime($request->enddate)));
        $from = Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:s:i", strtotime($request->startdate)));

        $diff_in_days = $to->diffInDays($from);

        $admin = Admin::findOrFail($request->admin_id); 
        $this->savLog(Auth::user()->id, Auth::user()->name, $data->id, $admin->name, $admin->category->name, "اجازة", Carbon::now() , $request->startdate, $request->enddate, $diff_in_days,  "اضافة اجازة - ".$vacation->name  );

        return redirect('admin/show-admin/' . $request->admin_id)
            ->with('message', 'تم الاضافة بنجاح')
            ->with('status', 'success');
    }


    public function destroy(Request $request)
    {
        $adminVacation = AdminVacation::whereIn('id', $request->id)->get();

        try {
            foreach ($adminVacation as $key => $item) {
                $vacation = Vacation::find($item->vacation_id);
                $admin = Admin::findOrFail($item->admin_id);

                $to = Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:s:i", strtotime($item->enddate)));
                $from = Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:s:i", strtotime($item->startdate)));

                $diff_in_days = $to->diffInDays($from);

                $categories = AdminVacation::where('id', $item->id)->delete();
                $this->savLog(Auth::user()->id, Auth::user()->name, $item->id, $admin->name, $admin->category->name, "اجازة", $item->created_at, $item->startdate, $item->enddate, $diff_in_days,  "حذف اجازة - ".$vacation->name  );
            }

        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = AdminVacation::find($id);

        if ($query['data']) {
            return view('admin/admin/vacation/show', $query);
        } else {
            return redirect()->back()->with('message', "عفوا تم حذف الحالة")->with('status', 'error');
        }
        
    }

    public function SendMail($id)
    {
        $query['data'] = AdminVacation::find($id);
        // dd($query['data']['status_id']);
        if ($query['data']) {
            $query['status'] = Vacation::find($query['data']['status_id']);
            $query['admin'] = Admin::findOrFail($query['data']['admin_id']);

            return view('admin.admin.vacation.mail', $query);
        } else {
            return redirect()->back()->with('message', "عفوا تم حذف الحالة")->with('status', 'error');
        }

    }

    public function storeDetail(Request $request)
    {
        $rule = [
            'admin_vacation_id' => 'required',
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

        $data = AdminVacationDetail::create([
            'admin_vacation_id' => $request->admin_vacation_id,
            'note' => $request->note,
            'photo' => $photo,

        ]);
        
        return redirect('admin/show-vacation-detail/' . $request->admin_vacation_id)
            ->with('message', 'تم الاضافة بنجاح')
            ->with('status', 'success');
    }

    public function deleteDetail($id)
    {
        try {
            $categories = AdminVacationDetail::where('id', $id)->delete();

        } catch (\Exception $e) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }
        return redirect()->back()->with('message', 'تم الحذف بنجاح')->with('status', 'success');
    }

}
