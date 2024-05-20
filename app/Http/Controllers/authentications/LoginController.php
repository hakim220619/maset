<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login', ['pageConfigs' => $pageConfigs]);
  }
  public function login_action(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'email_username' => 'required',
      'password' => 'required',
    ]);
    if (Auth::attempt(['email' => $request->email_username, 'password' => $request->password])) {
      $session = User::where('email', $request->email_username)->first();
      // dd($session);
      Session::put('full_name', $session->full_name);

      $request->session()->regenerate();
      return redirect()->intended('/dashboard/admin');
    } else {
      $chekckLogin = DB::table('users')->where('email', $request->email_username)->first();
      // dd($chekckLogin);
      if ($chekckLogin == null) {
        return back()->withInput()->withErrors([
          'email_username' => 'Masukan email dengan benar!!',
          // 'password' => 'Wrong password',
        ]);
      } else {
        return back()->withInput()->withErrors([
          // 'email' => 'Masukan email dengan benar!!',
          'password' => 'Masukan password dengan benar!!',
        ]);
      }
    }
  }
  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }
}
