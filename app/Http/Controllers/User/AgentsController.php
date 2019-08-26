<?php

namespace App\Http\Controllers\User;

use App;
use Session;
use App\Models\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Mail\SendMail;

class AgentsController extends Controller
{
    public function index()
    {
        $language = Session::get('locale');
        $agent = Agent::orderBy('id')->select(
            'agents.*',
            "name_$language as name",
            "address_$language as address"
        )->get();
        $image_agent = Configuration::where('config_key', Configuration::CONFIG_KEYS['AGENT_BANNER'])->select('configurations.*')->first();
        return view("user.agents.index", compact('agent'));
    }

    public function getAgent($id)
    {
        $language = Session::get('locale');
        $agent = Agent::where('id', $id)->select(
            'agents.*',
            "name_$language as name",
            "address_$language as address"
        )->get();
        $data = [];
        if($id){
            for ($i = 0; $i < count($agent); $i++) {
                if($agent[$i]['id'] == $id){
                    $data = $agent[$i];
                }
            }
        }
        return view("user.agents_detail.index", compact('data'));
    }
}