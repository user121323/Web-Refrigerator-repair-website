<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/locale','App\Http\Controllers\LanguageController@changelocale')->name("locale");

Route::middleware(['set_locale'])->group(function(){

    Route::get('/', function () {
        $current_lang = session('locale');

        if ($current_lang==null){
            $loc = 'en';
            return redirect()->route('locale',compact("loc"));
        }

        $styles = "css/home.css";

        $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
        $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();
        return view('user.homepage',compact('languages','current_locale','styles'));
    });
    Route::get('/services', "App\Http\Controllers\ServicesController@index");
    Route::get('/contacts', function () {
        $current_lang = session('locale');

        if ($current_lang==null){
            $loc = 'en';
            return redirect()->route('locale',compact("loc"));
        }

        $styles = "css/contacts.css";

        $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
        $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();
        return view('user.contacts',compact('languages','current_locale','styles'));
    });
    Route::get("/about",function (){

        $current_lang = session('locale');

        if ($current_lang==null){
            $loc = 'en';
            return redirect()->route('locale',compact("loc"));
        }

        $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
        $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();

        return view('user.abouts',compact('languages','current_locale'));
    });
    Route::get('/feedback', function () {
        $current_lang = session('locale');

        if ($current_lang==null){
            $loc = 'en';
            return redirect()->route('locale',compact("loc"));
        }

        $styles = "css/feedback.css";

        $reviews = \Illuminate\Support\Facades\DB::table("reviews")->get();
        $users = array();
        foreach ($reviews as $review){
            $u = \Illuminate\Support\Facades\DB::table("accounts")->where("id",$review->user_id)->first();
            if (!in_array($u,$users)){
                array_push($users,$u);
            }
        }

        $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
        $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();
        return view('user.feedback',compact('languages','current_locale','styles',"reviews","users"));


    });

    Route::get('/sendrequest', "App\Http\Controllers\ApplicationController@index");

    Route::post('/sendapplication', "App\Http\Controllers\ApplicationController@sendapplication");

    Route::post("/registration","App\Http\Controllers\AccountController@register");

    Route::get("/registration","App\Http\Controllers\AccountController@index");

    Route::get("/profile","App\Http\Controllers\AccountController@profile");

    Route::post("/login","App\Http\Controllers\AccountController@login");

    Route::get("/logout","App\Http\Controllers\AccountController@logout");

    Route::post("/editfullname","App\Http\Controllers\AccountController@editFullname");

    Route::post("/editphonenumber","App\Http\Controllers\AccountController@editPhoneNumber");

    Route::post("/editpassword","App\Http\Controllers\AccountController@editPassword");

    Route::post("/sendfeedback", "App\Http\Controllers\ReviewsController@addFeedback");

    Route::get("/admin",function(){
        if (session()->exists('user') && session()->get("user")->isadmin==1) {
            return view("admin.adminmain");
        }
        return redirect()->back();
    });

    Route::get("/admin/users","App\Http\Controllers\AccountController@listofuser");

    Route::post("/admin/deleteuser","App\Http\Controllers\AccountController@deleteuser");

    Route::get("/admin/applications","App\Http\Controllers\ApplicationController@listapplication");

    Route::post("/admin/doneapplication","App\Http\Controllers\ApplicationController@doneapplication");

    Route::get("/admin/services","App\Http\Controllers\ServicesController@listservice");

    Route::get("/admin/addservice","App\Http\Controllers\ServicesController@addservice");

    Route::post("/admin/addservice","App\Http\Controllers\ServicesController@addservicepost");

    Route::get("/admin/detailservice","App\Http\Controllers\ServicesController@detailservice");

    Route::post("/admin/saveservice","App\Http\Controllers\ServicesController@saveservice");

    Route::post("/admin/deleteservice","App\Http\Controllers\ServicesController@deleteservice");

    Route::post("/sendquestion","App\Http\Controllers\QuestionsController@sendquestion");
});

