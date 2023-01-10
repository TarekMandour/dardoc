<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Resources\PartnerResource;
use Validator;

class PagesController extends Controller
{
   public function Settings(Request $request){
       $results = Setting::first();

       $data['id'] = $results->id;
       $data['title'] = $results->append_title;
       $data['logo1'] = $results->logo1;
       $data['logo2'] = $results->logo2;
       $data['site_lang'] = $results->site_lang;
       $data['phone1'] = $results->phone1;
       $data['phone2'] = $results->phone2;
       $data['email1'] = $results->email1;
       $data['email2'] = $results->email2;
       $data['address'] = $results->append_address;
       $data['website'] = $results->website;
       $data['location'] = $results->location;
       $data['facebook'] = $results->facebook;
       $data['twitter'] = $results->twitter;
       $data['youtube'] = $results->youtube;
       $data['linkedin'] = $results->linkedin;
       $data['instagram'] = $results->instagram;
       $data['snapchat'] = $results->snapchat;

       return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $data]);

   }

   public function getPdf(Request $request){
    $results = Setting::first();

    $data['pdf'] = $results->pdf;

    return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $data]);

}

   public function Contact(Request $request)
    {

        ini_set('serialize_precision', 14);
        $rule = [
            'name' => 'required',
            'phone' => 'required',
            'msg' => 'required',

        ];

        $validate = Validator::make($request->all(), $rule);

        if ($validate->fails()) {

            return response(['status' => 401, 'msg' => $validate->messages()->first(), 'data' => NULL]);
        }

        $data = new Contact();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->msg = $request->msg;
        $data->save();

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $data]);


    }

    public function AboutUs(){
        $results = Page::find(1);

        $data['id'] = $results->id;
        $data['title'] = $results->append_title;
        $data['content'] = $results->append_content;

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $data]);

    }

    public function TermsConditions(Request $request){
        $results = Page::find(3);
        
        $data['id'] = $results->id;
        $data['title'] = $results->append_title;
        $data['content'] = $results->append_content;

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $data]);

    }

    public function Policies(Request $request){
        $results = Page::find(2);
        
        $data['id'] = $results->id;
        $data['title'] = $results->append_title;
        $data['content'] = $results->append_content;

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $data]);
    }

    public function clublist(Request $request){
        $results = Partner::orderBy('id', 'asc')->paginate(9);
        $results = PartnerResource::collection($results)->response()->getData(true);

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $results]);
    }
}
