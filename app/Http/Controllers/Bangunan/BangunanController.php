<?php

namespace App\Http\Controllers\Bangunan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BangunanController extends Controller
{
    function bangunan()
    {
        return view('content.object.bangunan.bangunan');
    }
}
