<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function sendquestion(Request $request){
        $question_text = $request->question_text;
        $phone_number = $request->phone_number;
        $client_name = $request->client_name;

        if (isset($question_text) && isset($phone_number) && isset($client_name)){
            $usersTimezone = 'Asia/Almaty';

            date_default_timezone_set($usersTimezone);
            $wrote_datetime = date("Y-m-d H:i:s");
            $question = Questions::insert(array("name" => $client_name, "phonenumber" => $phone_number, "question" => $question_text, "wrote_datetime"=>$wrote_datetime));

        }


        return redirect()->back();
    }
}
