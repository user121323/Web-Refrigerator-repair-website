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
        $login = "";
        $password = "";
        $remeberme = "";


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
                setcookie('login', $login, time()+(3600*24*30));
                setcookie('password', sha1($password), time()+(3600*24*30));
                setcookie('rememberme', "true", time()+(3600*24*30));
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

    public function profile(Request $request){
        $current_lang = session('locale');
        $result ="";
        $result = $request->result;

        $user = session("user");
        if ($user!=null){

            if ($current_lang==null){
                $loc = 'en';
                return redirect()->route('locale',compact("loc"));
            }

            $styles = "css/profile.css";

            $languages = \Illuminate\Support\Facades\DB::table("languages")->where("code","!=",$current_lang)->get();
            $current_locale = \Illuminate\Support\Facades\DB::table("languages")->where("code","=",$current_lang)->first();

            return view("user.profile",compact('languages','current_locale',"styles","user","result"));
        }
        return redirect("/registration");
    }

    public function editFullname(Request $request){
        $user = session("user");
        if ($user!=null){
            $fullname = $request->fullname;
            $id = $request->uid;
            $usercheck = DB::table('accounts')->where('id',$id)->first();
            if ($usercheck!=null){
                DB::table('accounts')->where('id',$id)->update(["fullname"=>$fullname]);
                $user = DB::table('accounts')->where('id',$id)->first();
                session(['user' => $user]);
                return redirect("/profile?result=success");
            }
            return redirect("/profile");
        }
        return redirect("/registration");
    }

    public function editPhoneNumber(Request $request){
        $user = session("user");
        if ($user!=null){
            $phonenumber = $request->phonenumber;
            $id = $request->uid;
            $usercheck = DB::table('accounts')->where('id',$id)->first();
            if ($usercheck!=null){
                DB::table('accounts')->where('id',$id)->update(["phonenumber"=>$phonenumber]);
                $user = DB::table('accounts')->where('id',$id)->first();
                session(['user' => $user]);
                return redirect("/profile?result=success");
            }

            return redirect("/profile");
        }
        return redirect("/registration");
    }

    public function editPassword(Request $request){
        $user = session("user");
        if ($user!=null){
            $oldpassword = sha1($request->oldpassword);
            $newpassword = sha1($request->newpassword);
            $newrepassword = sha1($request->newrepassword);
            $id = $request->uid;

            $usercheck = DB::table('accounts')->where('id',$id)->first();
            if (strcmp($newpassword,$newrepassword)==0){
                if ($usercheck!=null && strcmp($usercheck->password,$oldpassword)==0){
                    DB::table('accounts')->where('id',$id)->update(["password"=>$newpassword]);
                    $user = DB::table('accounts')->where('id',$id)->first();
                    session(['user' => $user]);
                    return redirect("/profile?result=success");
                }
                return redirect("/profile?result=invalidoldpasswrod");
            }

            return redirect("/profile?result=newpasswordsnotmatch");
        }
        return redirect("/registration");
    }
}
