<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterBasic extends Controller
{
  public function index()
  {
    $data['pageConfigs'] = ['myLayout' => 'blank'];
    $data['role_structure'] = DB::table('role_structure')->whereNot('rs_id', 4)->where('rs_status', 'ACTIVE')->get();
    return view('content.authentications.auth-register', $data);
  }
  function addRegister(Request $request)
  {
    // dd($request->all());
    User::ProsesAddUsersRegister($request);
    // toast('', 'success');
    toast('', 'success');
    return redirect('/')->with('success', 'Users Successs Added!');
    // dd($request->all());
  }
}
