<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Role; 
use Validator;

class SettingController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }


    public function edit()
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Setting::find(1);
        return view('admin.setting.edit', $query);
    }

    public function update(Request $request)
    {

        $rule = [
            'title' => 'required|string',
            'phone1' => 'required',
            'email1' => 'required',
            'logo1' => 'image|mimes:png,jpg,jpeg|max:2048',
            'logo2' => 'image|mimes:png,jpg,jpeg|max:2048',
            'fav' => 'image|mimes:png,jpg,jpeg|max:2048',
            'breadcrumb' => 'image|mimes:png,jpg,jpeg|max:2048',
            'pdf' => 'mimes:pdf|max:2048',
        ];
        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) { 
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Setting::find(1);

        if ($row->logo1) {
            $pathinfo = pathinfo($row->logo1);
            $ori_logo1 = $pathinfo['filename'] . '.' . $pathinfo['extension'];
        } else {
            $ori_logo1 = NULL;
        }

        if ($row->logo2) {
            $pathinfo2 = pathinfo($row->logo2);
            $ori_logo2 = $pathinfo2['filename'] . '.' . $pathinfo2['extension'];
        } else {
            $ori_logo2 = NULL;
        }

        if ($row->fav) {
            $pathinfo4 = pathinfo($row->fav);
            $ori_logo4 = $pathinfo4['filename'] . '.' . $pathinfo4['extension'];
        } else {
            $ori_logo4 = NULL;
        }

        if ($row->breadcrumb) {
            $pathinfo3 = pathinfo($row->breadcrumb);
            $ori_logo3 = $pathinfo3['filename'] . '.' . $pathinfo3['extension'];
        } else {
            $ori_logo3 = NULL;
        }

        if ($row->pdf) {
            $pathinfo5 = pathinfo($row->pdf);
            $ori_logo5 = $pathinfo5['filename'] . '.' . $pathinfo5['extension'];
        } else {
            $ori_logo5 = NULL;
        }

        if ( $logo1 = $request->file('logo1') ) {

            $name1 = 'logo1'.time(). '.' .$logo1->getClientOriginalExtension();
            $logo1->move(public_path('uploads/settings/'), $name1);
            $logo1 = $name1;
        } else {

            $logo1 = $ori_logo1;
        }

        if ( $logo2 = $request->file('logo2') ) {
            $name2 = 'logo2'.time(). '.'.$logo2->getClientOriginalExtension();
            $logo2->move(public_path('uploads/settings/'), $name2);
            $logo2 = $name2;
        } else {
            $logo2 = $ori_logo2;
        }

        if ( $img3 = $request->file('fav') ) {
            $name3 = 'fav'.time(). '.' .$img3->getClientOriginalExtension();
            $img3->move(public_path('uploads/settings/'), $name3);
            $fav = $name3;
        } else {
            $fav = $ori_logo4;
        }

        if ( $img4 = $request->file('breadcrumb') ) {
            $name4 = 'breadcrumb'.time(). '.' .$img4->getClientOriginalExtension();
            $img4->move(public_path('uploads/settings/'), $name4);
            $breadcrumb = $name4;
        } else {
            $breadcrumb = $ori_logo3;
        }

        if ( $img5 = $request->file('pdf') ) {
            $name5 = 'pdf'.time(). '.' .$img5->getClientOriginalExtension();
            $img5->move(public_path('uploads/settings/'), $name5);
            $pdf = $name5;
        } else {
            $pdf = $ori_logo5;
        }

        $data = Setting::where('id', 1)->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'meta_description_en' => $request->meta_description_en,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'address' => $request->address,
            'address_en' => $request->address_en,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'snapchat' => $request->snapchat,
            'work_time' => $request->work_time,
            'website' => $request->website,
            'location' => $request->location,
            'logo1' => $logo1,
            'logo2' => $logo2,
            'fav' => $fav,
            'breadcrumb' => $breadcrumb,
            'pdf' => $pdf,
        ]);        
        
        return redirect()->back()->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

}
