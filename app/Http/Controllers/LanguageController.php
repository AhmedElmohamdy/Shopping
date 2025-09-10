<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function SetLocal($lang)
    {
       
        // Check if the language is supported
        if (in_array($lang, ['en', 'ar'])) {
            // Set the application locale
            App::setLocale($lang);
            Session::put('locale', $lang);
    }
        // Redirect back to the previous page
        return back();
    }       
}
