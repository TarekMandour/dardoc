<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Partner;
use Validator;

class PartnerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.partner.index');
    }

    public function datatable(Request $request)
    {
        $data = Partner::orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('photo', function ($row) {
                $photo = '';
                if ($row->photo) {
                $photo .= ' <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales" target="_blank" href="'. $row->photo .'">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-75px h-100" style="background-image:url('. $row->photo .')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>';
                } else {
                    $photo .= ' <span class="text-gray-800 text-hover-primary mb-1">---</span>';

                }
                return $photo;
            })
            ->editColumn('title', function ($row) {
                $title = '';
                $title .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title . '</span>';
                return $title;
            })
            ->editColumn('link', function ($row) {
                $link = '';
                $link .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->link . '</span>';
                return $link;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-partner/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> تعديل</a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'title', 'link', 'photo'])
            ->make();

    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'title' => 'required|string',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        if ($img = $request->file('photo')) {
            $name = 'img_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/partners'), $name);
            $photo = $name;
        } else {
            $photo = NULL;
        }

        $data = Partner::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'link' => $request->link,
            'photo' => $photo,
        ]);
        return redirect('admin/partner')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Partner::find($id);
        return view('admin.partner.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'title' => 'required|string',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Partner::find($request->id);

        if ($row->photo) {
            $pathinfo = pathinfo($row->photo);
            $ori_image = $pathinfo['filename'] . '.' . $pathinfo['extension'];
        } else {
            $ori_image = NULL;
        }

        if ($img = $request->file('photo')) {
            $name = 'img_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/partners'), $name);
            $photo = $name;
        } else {
            $photo = $ori_image;
        }

        $data = Partner::where('id', $request->id)->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'link' => $request->link,
            'photo' => $photo,
        ]);

        return redirect('admin/partner')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            Partner::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
