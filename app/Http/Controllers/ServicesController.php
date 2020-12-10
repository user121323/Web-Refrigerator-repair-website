<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class ServicesController extends Controller
{

    public function index(){
        $current_lang = session('locale');

        if ($current_lang==null){
            $loc = 'en';
            return redirect()->route('locale',compact("loc"));
        }

        $styles = "css/services.css";

        $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
        $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();
        $services = DB::table('services')->where("services_language_id",$current_locale->id)->get();
        return view('user.services',compact('languages','current_locale','styles','services'));
    }
    public function listservice(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $services = DB::table('services')->get();
            return view('admin.adminservice', compact('services'));
        }
        return redirect()->back();
    }
    public function addservice(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $languages = DB::table('languages')->get();

            return view('admin.addservice',compact("languages"));
        }
        return redirect()->back();
    }
    public function addservicepost(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            DB::table('services')->insert(['name'=>$name, 'description'=>$description,"price"=>$price]);
            return redirect('/admin/services');
        }
        return redirect()->back();
    }

    public function detailservice(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $id = $request->serviceid;
            $service = DB::table('services')->where("id",$id)->first();
            return view("admin.detailservice",compact('service'));
        }
        return redirect()->back();
    }

    public function saveservice(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $id = $request->serviceid;
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            $service = DB::table('services')->where("id",$id)->update(["name"=>$name,'description'=>$description,'price'=>$price]);
            return redirect("/admin/services");
        }
        return redirect()->back();
    }

    public function deleteservice(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $id = $request->serviceid;
            $service = DB::table('services')->where("id",$id)->delete();
            return redirect("/admin/services");
        }
        return redirect()->back();
    }
}
