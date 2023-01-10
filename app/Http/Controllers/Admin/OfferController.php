<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class OfferController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        $data = Category::orderBy('id', 'desc')->first();

        return view('admin.offer.index');
    }

    public function datatable(Request $request)
    {
        $data = Offer::orderBy('id', 'asc');
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
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/edit-offer/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'name_en', 'created_at'])
            ->make();

    }

    public function create()
    {
        return view('admin.offer.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'title' => 'required|string',
            'title_en' => 'required|string',
            'slogan' => 'required|string',
            'slogan_en' => 'required|string',
            'content' => 'required|string',
            'content_en' => 'required|string',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
//            'qrcode' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $qr_code_name = time() . uniqid() . '_offer.png';
        $qr_code = QrCode::color(255, 0, 127)
            ->format('png')
            ->size(250)
            ->generate($request->slogan, public_path('uploads/offers/' . $qr_code_name));


        $data = Offer::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'slogan' => $request->slogan,
            'slogan_en' => $request->slogan_en,
            'content' => $request->content,
            'content_en' => $request->content_en,
            'photo' => $request->photo,
            'qrcode' => $qr_code_name,

        ]);
        return redirect('admin/offer')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

//    public function show($id)
//    {
//        // $query['data'] = Admin::where('id', $id)->get();
//        $query['data'] = Admin::find($id);
//        return view('admin.admin.show', $query);
//    }

    public function edit($id)
    {
        $query['data'] = Offer::findOrFail($id);
        return view('admin.offer.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'id' => 'required',
            'title' => 'required|string',
            'title_en' => 'required|string',
            'slogan' => 'required|string',
            'slogan_en' => 'required|string',
            'content' => 'required|string',
            'content_en' => 'required|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
//            'qrcode' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];


        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $qr_code_name = time() . uniqid() . '_offer.png';
        $qr_code = QrCode::color(255, 0, 127)
            ->format('png')
            ->size(250)
            ->encoding('UTF-8')
            ->generate((string)$request->slogan, public_path('uploads/offers/' . $qr_code_name));


        $data = Offer::findOrFail($request->id);
        $data->title = $request->title;
        $data->title_en = $request->title_en;
        $data->slogan = $request->slogan;
        $data->slogan_en = $request->slogan_en;
        $data->content = $request->content;
        $data->content_en = $request->content_en;
        if (is_file($request->photo)) {
            $data->photo = $request->photo;
        }

        $data->qrcode = $qr_code_name;

        $data->save();


        return redirect('admin/offer')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            $categories = Offer::whereIn('id', $request->id)->delete();

        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
