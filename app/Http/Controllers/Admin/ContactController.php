<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.contact.index');
    }

    public function datatable(Request $request)
    {
        $data = Contact::orderBy('id', 'asc');
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
                $phone = '';
                $phone .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';
                return $phone;
            })
            ->addColumn('email', function ($row) {
                $email = '';
                $email .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->email . '</span>';
                return $email;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("admin/show-contact/" . $row->id) . '" class="btn btn-icon btn-light-warning"><i class="bi bi-eye-fill"></i> </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'phone', 'email', 'created_at'])
            ->make();

    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|string',
            'name_en' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'parent' => 'nullable',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = Contact::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'parent' => $request->parent,
            'photo' => $request->photo,
        ]);
        return redirect('admin/contact')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

   public function show($id)
   {
       // $query['data'] = Admin::where('id', $id)->get();
       $query['data'] = contact::find($id);
       return view('admin.contact.show', $query);
   }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Contact::find($id);
        return view('admin.contact.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'id' => 'required',
            'name' => 'required|string',
            'name_en' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'parent' => 'nullable',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Contact::findOrFail($request->id);
        $data->name = $request->name;
        $data->name_en = $request->name_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->parent = $request->parent;
        if(is_file($request->photo)){
        $data->photo = $request->photo;
        }
        $data->save();


        return redirect('admin/contact')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            $categories = Contact::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
