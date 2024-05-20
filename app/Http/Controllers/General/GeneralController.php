<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    function aplikasi()
    {
        $data['title'] = "Aplikasi";
        $data['aplikasi'] = DB::table('aplikasi')->first();
        return view('content.general.aplikasi', $data);
    }
}
