<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LanguageController extends Controller
{
    public function changelocale(Request $request){
        $locale = $request->loc;
        session(['locale'=>$locale]);
        App::setlocale($locale);
        return redirect()->back();
    }
}
