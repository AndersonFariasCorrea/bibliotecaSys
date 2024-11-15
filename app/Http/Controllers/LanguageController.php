<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        $languages = config('app.languages');
        if (is_array($languages) && array_key_exists($lang, $languages)) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    }
}
