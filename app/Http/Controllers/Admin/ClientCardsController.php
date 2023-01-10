<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\ClientCard;
use App\Models\Post;
use App\Models\PostGallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class ClientCardsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }


    public function button($id)
    {

        $query['data'] = Client::findOrFail($id);
        return view('admin/client/cards/button', $query);
    }

    public function datatable(Request $request, $id)
    {
        $data = ClientCard::where('client_id', $id)->orderBy('id', 'asc');
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $category = '';
                $category .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $category;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = '';
                $actions .= ' <a href="' . url("admin/edit-client-card/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-eye-fill"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'created_at'])
            ->make();

    }

    public function create($id)
    {
        $query['data'] = Client::findOrFail($id);

        return view('admin.post_image.create', $query);
    }

    public function store(Request $request)
    {
        $rule = [
            'client_id' => 'required',
            'name' => 'required',

        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $data = ClientCard::create([
            'client_id' => $request->client_id,
            'name' => $request->name,

        ]);
        return redirect('admin/edit-client/' . $request->client_id)
            ->with('message', 'تم الاضافة بنجاح')
            ->with('status', 'success');
    }


    public function destroy(Request $request)
    {

        try {
            $categories = ClientCard::whereIn('id', $request->id)->delete();

        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
