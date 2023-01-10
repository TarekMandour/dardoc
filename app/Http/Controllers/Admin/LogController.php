<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Log;
use Validator;

class LogController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);


        return view('admin.log.index');
    }

    public function datatable(Request $request)
    {
        $data = Log::orderBy('id', 'desc');
        return Datatables::of($data)
            ->editColumn('num', function ($row) {
                $num = '';
                if ($row->type == "حالة ادارية") {
                    $num .= ' <a href="' . url("admin/show-status-detail/" . $row->num) . '" class="btn btn-icon btn-light-warning"> ';
                } else {
                    $num .= ' <a href="' . url("admin/show-vacation-detail/" . $row->num) . '" class="btn btn-icon btn-light-warning"> ';
                }

                $num .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->num . '</span>';
                $num .= '</a>';
                return $num;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('category', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->category . '</span>';
                return $category;
            })
            ->editColumn('type', function ($row) {
                $type = '';
                $type .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->type . '</span>';
                return $type;
            })
            ->editColumn('action_date', function ($row) {
                $action_date = '';
                $action_date .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->action_date)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $action_date;
            })
            ->editColumn('start_date', function ($row) {
                if($row->start_date){$start_date = Carbon::parse($row->start_date)->translatedFormat("Y-m-d H:i a");}else{$start_date = '';};

                $start_date = ' <span class="text-gray-800 text-hover-primary mb-1">' . $start_date . '</span>';
                return $start_date;
            })
            ->editColumn('end_date', function ($row) {
                if($row->end_date){$end_date = Carbon::parse($row->end_date)->translatedFormat("Y-m-d H:i a");}else{$end_date = '';};

                $end_date = ' <span class="text-gray-800 text-hover-primary mb-1">' . $end_date. '</span>';
                return $end_date;
            })
            ->editColumn('admin_name', function ($row) {
                $admin_name = '';
                $admin_name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->admin_name . '</span>';
                return $admin_name;
            })
            ->editColumn('days', function ($row) {
                $days = '';
                $days .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->days . '</span>';
                return $days;
            })
            ->editColumn('description', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->description . '</span>';
                return $name_en;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->rawColumns(['name', 'description', 'created_at', 'category', 'days', 'end_date', 'start_date', 'action_date', 'type', 'admin_name', 'num'])
            ->make();

    }

    public function create()
    {
        return view('admin.category.create');
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


        $data = Category::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'parent' => $request->parent,
            'photo' => $request->photo,
        ]);
        return redirect('admin/category')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
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
        $query['data'] = Category::find($id);
        return view('admin.category.edit', $query);
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

        $data = Category::findOrFail($request->id);
        $data->name = $request->name;
        $data->name_en = $request->name_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->parent = $request->parent;
        if(is_file($request->photo)){
        $data->photo = $request->photo;
        }
        $data->save();


        return redirect('admin/category')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            $categories = Category::whereIn('id', $request->id)->delete();
            $categories = Category::whereIn('parent', $request->id)->update(
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
