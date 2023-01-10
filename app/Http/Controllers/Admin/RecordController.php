<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class RecordController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.record.index');
    }

    public function datatable(Request $request)
    {
        $data = Record::orderBy('id', 'desc');

        
        if(!empty($request->startdate) && !empty($request->enddate)){
            $data = $data->whereBetween('created_at', [date('Y-m-d H:m:s',strtotime( $request->startdate )) , date('Y-m-d H:m:s',strtotime( $request->enddate ))]);
        }

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('id', function ($row) {
                $patient_name = '';
                $patient_name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->id . '</span>';
                return $patient_name;
            })
            ->editColumn('pregnancy', function ($row) {
                if ($row->pregnancy == 1) {
                    $title = "No communication";
                } else if ($row->pregnancy == 2) {
                    $title = "Pregnant";
                } else if ($row->pregnancy == 3) {
                    $title = "Not pregnant";
                }
                
                $pregnancy = '';
                $pregnancy .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $title . '</span>';
                return $pregnancy;
            })
            ->editColumn('patient_name', function ($row) {
                $patient_name = '';
                $patient_name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->patient_name . '</span>';
                return $patient_name;
            })
            ->editColumn('created_at', function ($row) {
                $created_at = '';
                $created_at .= ' <span class="text-gray-800 text-hover-primary mb-1">' . Carbon::parse($row->created_at)->translatedFormat("Y-m-d H:i a") . '</span>';
                return $created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("record-pdf/" . $row->id) . '" class="btn btn-light-dark"><i class="bi bi-eye"></i> PDF </a>';
                $actions .= ' <a href="' . url("admin/edit-record/" . $row->id) . '" class="btn btn-light-info"><i class="bi bi-pencil-fill"></i> Edit </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox','pregnancy', 'id', 'patient_name', 'created_at'])
            ->make();

    }

    public function create()
    {
        $medicine = Medicine::all();
        return view('admin.record.create', compact('medicine'));
    }

    public function store(Request $request)
    {
        $rule = [
            'patient_name' => 'required',
            'patient_age' => 'required',
            'husband_name' => 'required',
            'husband_age' => 'required',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }


        $items = $request->except('_token');
        $data = Record::create($items);

        return redirect('admin/record')->with('message', 'Saved successfully')->with('status', 'success');
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
        $query['data'] = Record::find($id);
        $query['medicine'] = Medicine::all();
        return view('admin.record.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'patient_name' => 'required',
            'patient_age' => 'required',
            'husband_name' => 'required',
            'husband_age' => 'required',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $items = $request->except('_token','id');

        $data = Record::where('id', $request->id)->update($items);


        return redirect('admin/record')->with('message', 'Modified successfully')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try {
            $categories = Record::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {

            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

}
