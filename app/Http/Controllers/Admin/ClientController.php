<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);


        return view('admin.client.index');
    }

    public function datatable(Request $request)
    {
        $data = Client::where('type', 0)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('phone', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $name_en;
            })->editColumn('job', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-warning mb-1">' . $row->jop . '</span>';
                return $name_en;
            })
            ->editColumn('membership_no', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $name_en;
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_active == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = '';
                $actions .= ' <a href="' . url("admin/edit-client/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'phone', 'job', 'membership_no', 'is_active', 'created_at'])
            ->make();

    }

    public function datatable_followers(Request $request, $parent_id)
    {
        $data = Client::where('parent_id', $parent_id)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('phone', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $name_en;
            })->editColumn('job', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-warning mb-1">' . $row->jop . '</span>';
                return $name_en;
            })
            ->editColumn('membership_no', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $name_en;
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_active == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = '';
                $actions .= ' <a href="' . url("admin/edit-client/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-eye-fill"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'phone', 'job', 'membership_no', 'is_active', 'created_at'])
            ->make();

    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {


        $rule = [
            'name' => 'required|string',
            'membership_no' => 'required|unique:clients',
            'national_no' => 'required|unique:clients',
            'phone' => 'required|unique:clients',
            'password' => 'required|confirmed',
            'email' => 'nullable',
            'jop' => 'nullable',
            'birth_date' => 'nullable|date',
            'register_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'is_active' => 'required|in:0,1',
            'type' => 'required|in:0,1',
            'parent_id' => 'required',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Client::create([
            'name' => $request->name,
            'membership_no' => $request->membership_no,
            'national_no' => $request->national_no,
            'phone' => $request->phone,
            'password' => $request->password,
            'email' => $request->email,
            'jop' => $request->jop,
            'delegate_name' => $request->delegate_name,
            'birth_date' => $request->birth_date,
            'register_date' => $request->register_date,
            'photo' => $request->photo,
            'is_active' => $request->is_active,
            'type' => $request->type,
            'parent_id' => $request->parent_id,

        ]);


        $prev = url()->previous();

        if (Str::contains($prev, ['edit-client'])) {
            return redirect('admin/edit-client/' . $request->parent_id)
                ->with('message', 'تم الاضافة بنجاح')
                ->with('status', 'success');
        } else {
            return redirect('admin/client')
                ->with('message', 'تم الاضافة بنجاح')
                ->with('status', 'success');
        }

    }

//    public function show($id)
//    {
//        // $query['data'] = Admin::where('id', $id)->get();
//        $query['data'] = Admin::find($id);
//        return view('admin.admin.show', $query);
//    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Client::findOrFail($id);
//            ->with(['Followers', 'Payments', 'Debts', 'Cards', 'Notifications'])


        $query['count_followers'] = $query['data']->Followers->count();

        return view('admin.client.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'id' => 'required',
            'name' => 'required|string',
            'membership_no' => 'required|unique:clients,membership_no,' . $request->id,
            'national_no' => 'required|unique:clients,national_no,' . $request->id,
            'phone' => 'required|unique:clients,phone,' . $request->id,
            'password' => 'nullable|confirmed',
            'email' => 'nullable',
            'jop' => 'nullable',
            'birth_date' => 'nullable|date',
            'register_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'is_active' => 'required|in:0,1',
            'type' => 'required|in:0,1',
            'parent_id' => 'required',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Client::findOrFail($request->id);
        $data->name = $request->name;
        $data->membership_no = $request->membership_no;
        $data->national_no = $request->national_no;
        $data->phone = $request->phone;

        $data->email = $request->email;
        $data->jop = $request->jop;
        $data->delegate_name = $request->delegate_name;
        $data->birth_date = $request->birth_date;
        $data->register_date = $request->register_date;

        $data->is_active = $request->is_active;
        $data->type = $request->type;
        $data->parent_id = $request->parent_id;
        if (is_file($request->photo)) {
            $data->photo = $request->photo;
        }
        if ($request->password) {
            $data->password = $request->password;
        }
        $data->save();


        return redirect('admin/edit-client/' . $request->id)->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            Client::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
