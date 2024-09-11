<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{

    public function set(Request $request, $lang){

        $acceptableLang=['en','ar'];

        if (! in_array($lang,$acceptableLang)) {

            $lang ='en';

        }

        $request->session()->put('lang',$lang);

        return back();

    }

}
