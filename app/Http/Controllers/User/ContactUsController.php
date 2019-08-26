<?php

namespace App\Http\Controllers\User;

use App;
use Session;
use App\Models\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Contact;
use App\Mail\SendMail;

class ContactUsController extends Controller
{
    public function index()
    {
        $language = Session::get('locale');
        $contact = Agent::where('is_contact', 1)->select(
            'agents.*',
            "name_$language as name",
            "address_$language as address")->first();
        $image_contact = Configuration::where('config_key', Configuration::CONFIG_KEYS['CONTACT_BANNER'])->select('configurations.*')->first();
        return view("user.contact-us.index", compact('contact','image_contact'));
    }

    public function submitContactUs(Request $request)
    {
        $input = $request->all();
        $data = array('content' => $input["content"],'name'=>$input["name"],'email'=>$input["email"], 'phone'=>$input['phone']);
        Contact::create($input);
        $res = \Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SendMail($data));
        return redirect("contact-us");
    }

}