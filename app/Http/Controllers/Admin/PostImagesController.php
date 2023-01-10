<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostGallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class PostImagesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index($id)
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        $query['data'] = Post::findOrFail($id);

        return view('admin.post_image.index', $query);
    }

    public function button($id)
    {

        $query['data'] = Post::findOrFail($id);

        return view('admin/post_image/button', $query);
    }

    public function datatable(Request $request, $id)
    {
        $data = PostGallery::where('post_id', $id)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('post', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Post ? $row->Post->title : "--" . '</span>';
                return $category;
            })
            ->editColumn('photo', function ($row) {
                $category = '';
                $category .= '<img src="' . $row->photo . '" height="50px" width="50px"/>';
                return $category;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->rawColumns(['actions', 'checkbox', 'photo', 'post', 'created_at'])
            ->make();

    }

    public function create($id)
    {
        $query['data'] = Post::findOrFail($id);

        return view('admin.post_image.create', $query);
    }

    public function store(Request $request)
    {
        $rule = [
            'post_id' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = PostGallery::create([
            'post_id' => $request->post_id,
            'photo' => $request->photo,

        ]);
        return redirect('admin/post-image/' . $request->post_id)
            ->with('message', 'تم الاضافة بنجاح')
            ->with('status', 'success');
    }


    public function destroy(Request $request)
    {

        try {
            $categories = PostGallery::whereIn('id', $request->id)->delete();

        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
