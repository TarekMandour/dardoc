<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Admin;
use Validator;
use auth;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);
        $query['roles'] =Role::all();

        return view('admin.admin.index', $query);
    }
    public function datatable(Request $request)
    {
        $data = Admin::orderBy('id', 'desc');
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

            ->editColumn('email', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->email . '</span>';
                return $phone;
            })
            ->editColumn('phone', function ($row) {
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $phone;
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">Active</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">Not Active</div>';
                if ($row->is_active == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/show-admin/" . $row->id) . '" class="btn btn-icon btn-light-warning"><i class="bi bi-eye-fill"></i> </a>';
                if(Auth::user()->can('تعديل موظف')){
                    $actions .= ' <a href="' . url("admin/edit-admin/" . $row->id) . '" class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i> </a>';
                }
                
                
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'email', 'phone', 'is_active'])
            ->make();

    }

    public function store(Request $request)
    { 
        $rule = [
            'name' => 'required|string',
            'email' => 'email|unique:admins',
            'phone' => 'required|unique:admins',
            'password' => 'required|min:6',
            'role' => 'required',
            'profile' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) { 
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }        

        if ( $img = $request->file('profile') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads/admins'), $name);
            $profile = $name;
        } else {
            $profile = NULL;
        }

        $data = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'photo' => $profile,
            'is_active' => $request->is_active,
        ]);

        $data->roles()->sync([$request->role]);

        return redirect()->back()->with('message', 'Saved successfully')->with('status', 'success');
    }

    public function show($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Admin::find($id);
        return view('admin.admin.show', $query);
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Admin::find($id);

        $query['roles'] =Role::all();

        return view('admin.admin.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'name' => 'required|string',
            'email' => 'email',
            'phone' => 'required',
            'role' => 'required',
            'profile' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) { 
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Admin::find($request->id);
        if ($row->photo) {
            $pathinfo = pathinfo($row->photo);
            $ori_image =  $pathinfo['filename'].'.'.$pathinfo['extension'];
        } else {
            $ori_image = NULL;
        }

        if($request->password) {
            $password = Hash::make($request->password) ;
        } else {
            $password = $row->password ; 
        }

        if ( $img = $request->file('profile') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads/admins'), $name);
            $profile = $name;
        } else {
            $profile = $ori_image;
        }

        $data = Admin::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password,
            'photo' => $profile,
            'is_active' => $request->is_active,
        ]);        

        $row->roles()->sync([$request->role]);
        
        return redirect()->back()->with('message', 'Modified successfully')->with('status', 'success');
    }

    public function destroy(Request $request)
    {   

        try{
            Admin::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
