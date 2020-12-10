<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use DB;
use Illuminate\Http\Response;

class AccountController extends Controller
{
    public function index(){
        $current_lang = session('locale');

        if ($current_lang==null){
            $loc = 'en';
            return redirect()->route('locale',compact("loc"));
        }

        $styles = "css/registration.css";

        $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
        $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();

        return view("registration",compact('languages','current_locale',"styles"));
    }

    public function register(Request $request){
        if (!session()->exists("user")) {
            $fullname = $request->fullname;
            $login = $request->login;
            $password = $request->password;
            $repassword = $request->repassword;
            $phonenumber = $request->phonenumber;
            $rememberme = $request->rememberme;
            $result = "";

            if ($fullname != null && $login != null && $password != null && $repassword != null && $phonenumber != null) {
                if (strcmp($password, $repassword) == 0) {

                    $user = Accounts::where("login", $login)->first();
                    if ($user != null) {
                        $result = "Логин существет";
                    } else {
                        $user = Accounts::where("phonenumber", $phonenumber)->first();
                        if ($user != null) {
                            $result = "Номер телефона используется другим пользователем";
                        } else if ($fullname != null && $login != null && $password != null && $phonenumber != null) {
                            $user = Accounts::insert(array("fullname" => $fullname, "login" => $login, "password" => sha1($password), "phonenumber" => str_replace(' ', '', $phonenumber), "isadmin" => false));

                            $result = "Вы зарегестрирвались";
                            $styles = "css/registration.css";
                            return view("registration", compact("result", "styles"));
                        }
                    }
                }
            }
        }

        return redirect("/registration");
    }

    public function login(Request $request){
        $login = $request->login;
        $password = $request->password;
        $rememberme=$request->rememberme;
        $result = "error";

        $user = Accounts::where('login',$login)->first();
        if (strcmp($user->password,sha1($password))==0){
            $response = new Response('hol.kz');
            $response->withCookie("login",$user->login,time()+3600);
            $response->withCookie("password",$user->password,time()+3600);
            $result = "success";

            if ($rememberme!=null){
                setcookie('login', $login, 3600);
                setcookie('password', sha1($password), 3600);
            }

            session(['user' => $user]);

            return redirect()->back();
        }
        return redirect("/registration");
    }

    public function logout(Request $request){
        if ($request->session()->exists('user')) {
            $request->session()->forget("user");
        }
        return redirect()->back();
    }

    public function listofuser(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $users = Accounts::all();
            return view('admin.adminuser',compact("users"));
        }
        return redirect()->back();
    }

    public function deleteuser(Request $request){
        if ($request->session()->exists('user') && $request->session()->get("user")->isadmin==1) {
            $id = $request->userid;
            $user = DB::table('accounts')->where('id',$id)->first();


            if ($user!=null){
                $user = DB::table('accounts')->where('id',$id)->delete();
            }

            return redirect('/admin/users');
        }
        return redirect("/registration");
    }
}
