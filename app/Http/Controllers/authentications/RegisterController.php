<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  public function index()
  {
    $data['pageConfigs'] = ['myLayout' => 'blank'];
    $data['role_structure'] = DB::table('role_structure')->whereNot('rs_id', 4)->where('rs_status', 'ACTIVE')->get();
    return view('content.authentications.auth-register', $data);
  }
  function addRegister(Request $request)
  {
    // $validator = $this->validate($request, [
    //   'email' => 'required|email|max:255|unique:users'
    // ]);
    $u = User::where('email', $request->email)->first();
    // dd($u);
    $input = $request->all();
    $rules = [
      'name' => 'required|max:64',
      'email' => 'required|email|max:255|unique:users,email, ' . $request->email,
      'nik' => 'required|unique:users,nik,' . $request->nik
    ];
    // $messages = [
    //   'email.required' => 'El Email es obligatorio',
    //   'email.max' => 'El Email no debe exceder los 128 caracteres',
    //   'email.unique' => 'Ya existe un usuario con este Email',
    //   'name.required' => 'El nombre es obligatorio',
    //   'name.max' => 'El Email no debe exceder los 64 caracteres',
    //   'role.required' => 'El Rol es obligatorio',
    // ];
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return redirect('/auth/register-view')->withErrors($validator)->withInput();
    } else {
      User::ProsesAddUsersRegister($request);
      // toast('', 'success');
      toast('', 'success');
      return redirect('/')->with('success', 'Users Successs Added!');
    }
  }
}
