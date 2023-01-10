<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Vacation;
use App\Models\AdminStatus;
use App\Models\AdminVacation;
use App\Models\Record;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class ReportController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function medicine()
    {
        return view('admin.report.medicine');
    }

    public function medicine_datatable_em(Request $request)
    {
        $datatype = Medicine::orderBy('id', 'desc');

        return Datatables::of($datatype)
            ->addIndexColumn()
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('count', function ($row) use ($request){
                $fsh = Record::select('number_fsh')->where('trade_fsh', $row->id)->whereBetween('created_at', [$request->startdate , $request->enddate])->sum('number_fsh');
                $hmg = Record::select('number_hmg')->where('trade_hmg', $row->id)->whereBetween('created_at', [$request->startdate , $request->enddate])->sum('number_hmg');
                $triggering = Record::select('number_triggering')->where('trade_triggering', $row->id)->whereBetween('created_at', [$request->startdate , $request->enddate])->sum('number_triggering');
                $e2 = Record::select('number_e2')->where('trade_e2', $row->id)->whereBetween('created_at', [$request->startdate , $request->enddate])->sum('number_e2');
                $p4 = Record::select('number_p4')->where('trade_p4', $row->id)->whereBetween('created_at', [$request->startdate , $request->enddate])->sum('number_p4');

                $count = $fsh + $hmg + $triggering + $e2 + $p4;
                return $count;
            })
            ->rawColumns(['name', 'count'])
            ->make();

    }

    public function employee()
    {
        return view('admin.report.employee');
    }

    public function employee_datatable(Request $request)
    {
        $datatype = Category::orderBy('id', 'desc');
        $admincount = Admin::where('is_active', 1)->count();

        return Datatables::of($datatype)
            ->addIndexColumn()
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('count', function ($row) {
                $countAdmin = Admin::where('is_active', 1)->where('cat_id', $row->id)->count();
                $count = $countAdmin ;
                return $count;
            })
            ->rawColumns(['name', 'count'])
            ->with('total', function() use ($admincount) {
                return $admincount;
            })
            ->make();

    }

    public function status()
    {
        return view('admin.report.status');
    }

    public function status_datatable_em(Request $request)
    {
        $datatype = Admin::with('status')->orderBy('id', 'desc');

        if($request->day == 'today'){
            $datatype = $datatype->whereHas('status', function ($q) use ($request) {
                $q->where('created_at','like' ,'%' .date('Y-m-d'). '%');
            });
        }
        elseif ($request->day == 'yesterday'){
            $datatype = $datatype->whereHas('status', function ($q) use ($request) {
                $q->where('created_at','like' ,'%' .date('Y-m-d',strtotime( '-1 days' )). '%');
            });
            
        }
        
        if(!empty($request->startdate) && !empty($request->enddate)){
            $datatype = $datatype->whereHas('status', function ($q) use ($request) {
                $q->whereBetween('created_at', [date('Y-m-d H:m:s',strtotime( $request->startdate )) , date('Y-m-d H:m:s',strtotime( $request->enddate ))]);
            });
        }

        return Datatables::of($datatype)
            ->addIndexColumn()
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('count', function ($row) {
                $countAdmin = count($row->status);
                $count = $countAdmin ;
                return $count;
            })
            ->rawColumns(['name', 'count'])
            ->make();

    }


    public function status_datatable_ca(Request $request)
    {
        $datatype = Category::orderBy('id', 'desc');

        return Datatables::of($datatype)
            ->addIndexColumn()
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('count', function ($row) use ($request) {
                $adminIds = Admin::select('id')->where('cat_id', $row->id)->get();
                $statusAdmin = AdminStatus::whereIn('admin_id', $adminIds);

                if($request->day == 'today'){
                    $statusAdmin->where('created_at','like' ,'%' .date('Y-m-d'). '%');
                }
                elseif ($request->day == 'yesterday'){
                    $statusAdmin->where('created_at','like' ,'%' .date('Y-m-d',strtotime( '-1 days' )). '%');
                }
                
                if(!empty($request->startdate) && !empty($request->enddate)){
                    $statusAdmin->whereBetween('created_at', [date('Y-m-d H:m:s',strtotime( $request->startdate )) , date('Y-m-d H:m:s',strtotime( $request->enddate ))]);
                }

                $countAdmin = $statusAdmin->count();

                $count = $countAdmin ;
                return $count;
            })
            ->rawColumns(['name', 'count'])
            ->make();

    }

    public function vacation()
    {
        return view('admin.report.vacation');
    }

    public function vacation_datatable_em(Request $request)
    {
        $datatype = Admin::with('vacations')->orderBy('id', 'desc');

        if($request->day == 'today'){
            $datatype = $datatype->whereHas('vacations', function ($q) use ($request) {
                $q->where('created_at','like' ,'%' .date('Y-m-d'). '%');
            });
        }
        elseif ($request->day == 'yesterday'){
            $datatype = $datatype->whereHas('vacations', function ($q) use ($request) {
                $q->where('created_at','like' ,'%' .date('Y-m-d',strtotime( '-1 days' )). '%');
            });
            
        }
        
        if(!empty($request->startdate) && !empty($request->enddate)){
            $datatype = $datatype->whereHas('vacations', function ($q) use ($request) {
                $q->whereBetween('created_at', [date('Y-m-d H:m:s',strtotime( $request->startdate )) , date('Y-m-d H:m:s',strtotime( $request->enddate ))]);
            });
        }

        return Datatables::of($datatype)
            ->addIndexColumn()
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('count', function ($row) {
                $countAdmin = count($row->vacations);
                $count = $countAdmin ;
                return $count;
            })
            ->rawColumns(['name', 'count'])
            ->make();

    }


    public function vacation_datatable_ca(Request $request)
    {
        $datatype = Category::orderBy('id', 'desc');

        return Datatables::of($datatype)
            ->addIndexColumn()
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('count', function ($row) use ($request) {
                $adminIds = Admin::select('id')->where('cat_id', $row->id)->get();
                $vacationAdmin = AdminVacation::whereIn('admin_id', $adminIds);

                if($request->day == 'today'){
                    $vacationAdmin->where('created_at','like' ,'%' .date('Y-m-d'). '%');
                }
                elseif ($request->day == 'yesterday'){
                    $vacationAdmin->where('created_at','like' ,'%' .date('Y-m-d',strtotime( '-1 days' )). '%');
                }
                
                if(!empty($request->startdate) && !empty($request->enddate)){
                    $vacationAdmin->whereBetween('created_at', [date('Y-m-d H:m:s',strtotime( $request->startdate )) , date('Y-m-d H:m:s',strtotime( $request->enddate ))]);
                }

                $countAdmin = $vacationAdmin->count();

                $count = $countAdmin ;
                return $count;
            })
            ->rawColumns(['name', 'count'])
            ->make();

    }

    
}
