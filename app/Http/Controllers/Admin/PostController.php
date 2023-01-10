<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);


        return view('admin.post.index');
    }

    public function datatable(Request $request)
    {
        $data = Post::orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('title', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title . '</span>';
                return $name;
            })
            ->editColumn('title_en', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title_en . '</span>';
                return $name_en;
            })
            ->editColumn('cat_id', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->category ? $row->category->name : "--" . '</span>';
                return $category;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = '';
                $actions .= ' <a href="' . url("admin/edit-post/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                $actions .= ' <a href="' . url("admin/post-image/" . $row->id) . '" class="btn btn-light-dark"><i class="bi bi-image-alt"></i> الصور </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'title', 'title_en', 'cat_id', 'created_at'])
            ->make();

    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'title' => 'required|string',
            'title_en' => 'required|string',
            'content' => 'required|string',
            'content_en' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'cat_id' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Post::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'content' => $request->content,
            'content_en' => $request->content_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'cat_id' => $request->cat_id,
            'photo' => $request->photo,
        ]);
        return redirect('admin/post')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
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
        $query['data'] = Post::findOrFail($id);
        return view('admin.post.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'id' => 'required',
            'title' => 'required|string',
            'title_en' => 'required|string',
            'content' => 'required|string',
            'content_en' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'cat_id' => 'required',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Post::findOrFail($request->id);
        $data->title = $request->title;
        $data->title_en = $request->title_en;
        $data->content = $request->content;
        $data->content_en = $request->content_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->cat_id = $request->cat_id;
        if (is_file($request->photo)) {
            $data->photo = $request->photo;
        }
        $data->save();


        return redirect('admin/post')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            $categories = Post::whereIn('id', $request->id)->delete();

        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
