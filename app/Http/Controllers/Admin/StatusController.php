<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class StatusController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);


        return view('admin.status.index');
    }

    public function datatable(Request $request)
    {
        $data = Status::orderBy('id', 'desc');
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
            ->editColumn('name_en', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name_en . '</span>';
                return $name_en;
            })
            ->addColumn('parent', function ($row) {
                $parent = '';
                $parent .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Status && $row->parent != 0 ? $row->Status->name : "--" . '</span>';
                return $parent;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-status/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'name_en', 'parent', 'created_at'])
            ->make();

    }

    public function create()
    {
        return view('admin.status.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'parent' => 'nullable',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Status::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'parent' => $request->parent,
            'photo' => $request->photo,
        ]);
        return redirect('admin/status')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
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
        $query['data'] = Status::find($id);
        return view('admin.status.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'id' => 'required',
            'name' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'parent' => 'nullable',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Status::findOrFail($request->id);
        $data->name = $request->name;
        $data->name_en = $request->name_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->parent = $request->parent;
        if(is_file($request->photo)){
        $data->photo = $request->photo;
        }
        $data->save();


        return redirect('admin/status')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            $categories = Status::whereIn('id', $request->id)->delete();
            $categories = Status::whereIn('parent', $request->id)->update(
                [
                    'parent' => 0
                ]
            );
        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
