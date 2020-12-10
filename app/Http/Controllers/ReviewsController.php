<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App;
use App\Models\Reviews;

class ReviewsController extends Controller
{
    public function addFeedback(Request $request){
        $user = session()->get("user");
        $user = \Illuminate\Support\Facades\DB::table('accounts')->where("id",$user->id)->first();
        if ($user !=null){
            $comment = $request->comment;
            $stars = $request->rate;

            if ($stars == null){
                $stars = 0;
            }
            $usersTimezone = 'Asia/Almaty';

            date_default_timezone_set($usersTimezone);

            $currentDateTime=date("Y-m-d H:i:s");


            $feedback = Reviews::insert(array("user_id"=>$user->id,"comment"=>$comment,
                "stars"=>$stars,"wrotedate"=> $currentDateTime));
        }
        return redirect("/feedback");
    }
}
