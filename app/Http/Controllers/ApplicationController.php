<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class ApplicationController extends Controller
{
    public function index(){
        $current_lang = session('locale');

        if ($current_lang==null){
            $loc = 'en';
            return redirect()->route('locale',compact("loc"));
        }

        $styles = "css/sendrequest.css";

        $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
        $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();

        return view("user.application",compact('languages','current_locale',"styles"));
    }

    public function listapplication(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $applications = DB::table('applications')->get();
            return view("admin.adminapp",compact('applications'));
        }
        return redirect()->back();
    }

    public function doneapplication(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $id = $request->applicationid;
            $applications = DB::table('applications')->where("id",$id)->update(['done'=>true]);
            return redirect("/admin/applications");
        }
        return redirect()->back();
    }

    public function sendapplication(Request $request){
        if (session()->exists("user")){
            $user = session()->get("user");
            $street = $request->street;
            $housenumber = $request->housenumber;
            $usersTimezone = 'Asia/Almaty';

            date_default_timezone_set($usersTimezone);

            $currentDateTime=date("Y-m-d H:i:s");

            $application = App\Models\Applications::insert(array("user_id"=>$user->id,"street"=>$street,
                "housenumber"=>$housenumber,"timeofapplication"=> $currentDateTime,"done"=>0));

            return redirect()->back();
        }
    }
}
