<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Medicine;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Slider;
use Dompdf\Dompdf;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query['sliders'] = Slider::orderBy('sort','asc')->get();
        return view('front.home', $query);
    }

    public function record_pdf($id)
    { 
        $record = Record::findOrFail($id);

        // Generate PDF file
        $dompdf = new DOMPDF();
        $is_pdf     = true;
        $html       = View::make('record-pdf',compact('record'));
        $dompdf->set_paper("A4", "portrait");
        $dompdf->load_html($html);
        $dompdf->render();
        // return $dompdf->stream();
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
        // $dompdf->stream('your_invoice_file.pdf');
    }

    public function policy () {
        $query['data'] = Page::find(3);
        return view('front.pages.policy',$query);
    }

    public function contactus(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|string',
            'phone' => 'required',
            'message' => 'required|string',
        ]);

        $data = new Contact;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->msg = $request->message;
        $data->save();
        
        if ($data) {
            return redirect('/#contact-section')->with('msg', 'Success');
        } else {
            return redirect('/#contact-section')->with('msg', 'Failed');
        }
    }

    public function register () {
        return view('front.pages.register');
    }

    public function registerform(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:clients',
            'phone' => 'required|unique:clients',
            'password' => 'required',
            'city_id' => 'required',
            'name_en' => 'required|string',
            'profile_photo' => 'required|image',
            'commerical_photo' => 'required|image',
            'license_photo' => 'required|image',
            'clinic_name' => 'required|string',
            'clinic_name_en' => 'required|string',
            'clinic_num' => 'required',
            'tax_num' => 'required',
            'tax_photo' => 'required|image',
            'content' => 'required',
            'phone2' => 'required',
            'content_certificate' => 'required',
            'content_certificate_en' => 'required',
            'content_license' => 'required',
            'content_license_en' => 'required',
        ]);

        $data['password'] = Hash::make($request->password);
        $data['phone'] = $request->code . $request->phone;
        $data['phone2'] = $request->code . $request->phone2;
        $data['is_enabled'] = 0;
        
        $data = Client::create($data);

        if ($data) {
            return redirect('/register-clinic')->with('msg', 'Success');
        } else {
            return redirect('/register-clinic')->with('msg', 'Failed');
        }
    }

}
