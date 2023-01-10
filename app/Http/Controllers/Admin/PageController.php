<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class PageController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.page.index');
    }

    public function datatable(Request $request)
    {
        $data = Page::orderBy('id', 'asc');
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
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title . '</span>';
                return $name;
            })
            ->editColumn('name_en', function ($row) {
                $name_en = '';
                $name_en .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title_en . '</span>';
                return $name_en;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->created_at . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-page/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> تعديل</a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'name_en', 'created_at'])
            ->make();

    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'title' => 'required|string',
            'content' => 'required|string',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Page::create([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);
        return redirect('admin/pages')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
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
        $query['data'] = Page::find($id);
        return view('admin.page.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'title' => 'required|string',
            'content' => 'required|string',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Page::find($request->id);

        if ($row->photo) {
            $pathinfo = pathinfo($row->photo);
            $ori_image = $pathinfo['filename'] . '.' . $pathinfo['extension'];
        } else {
            $ori_image = NULL;
        }

        if ($row->photo2) {
            $pathinfo2 = pathinfo($row->photo2);
            $ori_image2 = $pathinfo2['filename'] . '.' . $pathinfo2['extension'];
        } else {
            $ori_image2 = NULL;
        }

        if ($img = $request->file('photo')) {
            $name = 'img_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/pages'), $name);
            $photo = $name;
        } else {
            $photo = $ori_image;
        }

        if ($img = $request->file('photo2')) {
            $name = 'img2_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/pages'), $name);
            $photo2 = $name;
        } else {
            $photo2 = $ori_image2;
        }

        $data = Page::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'photo' => $photo,
            'photo2' => $photo2,
        ]);

        return redirect('admin/pages')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            Page::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
