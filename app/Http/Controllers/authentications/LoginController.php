<?php

namespace App\Http\Controllers\authentications;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class LoginController extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login', ['pageConfigs' => $pageConfigs]);
  }
  public function forgetPassword()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-forget-password', ['pageConfigs' => $pageConfigs]);
  }
  public function resetPasswordProses($token)
  {
    $data = DB::table('password_reset_tokens')->where('token', $token)->first();
    if ($data == null) {
      return redirect('/pages/misc-error');
    } else {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('content.authentications.auth-reset-password', ['pageConfigs' => $pageConfigs]);
    }
  }
  public function login_action(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'email_nik' => 'required',
      'password' => 'required',
    ]);
    $checkEmail = Validator::make(['email' => $request->email_kontak], [
      'email_nik' => 'required|email'
    ]);
    // dd($checkEmail);
    if (Auth::attempt($checkEmail->passes() == true ? ['email' => $request->email_nik, 'password' => $request->password] :  ['nik' => $request->email_nik, 'password' => $request->password])) {
      $session = User::where($checkEmail->passes() == true ? 'email' : 'nik', $request->email_nik)->first();
      // dd($session->status);
      if ($session->status != 'ACTIVE') {
        return back()->withInput()->withErrors([
          'status' => 'Email sedang tidak aktif!!',
          // 'password' => 'Wrong password',
        ]);
      }
      // dd($session);
      Session::put('name', $session->name);
      DB::table('users')->where('id', $session->id)->update(['active' => 'ON']);

      $request->session()->regenerate();
      $mmLogsData['activity'] = 'Login berhasil dengan nama ' . $session->name . '';
      $mmLogsData['detail'] = $session;
      $mmLogsData['action'] = 'Login';
      Helpers::mmLogs($mmLogsData);
      return redirect()->intended('/dashboard/admin');
    } else {
      $chekckLogin = DB::table('users')->where($checkEmail->passes() == true ? 'email' : 'nik', $request->email_nik)->first();
      // dd($chekckLogin);
      if ($chekckLogin == null) {
        return back()->withInput()->withErrors([
          'email_nik' => 'Masukan email atau nik dengan benar!!',
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
  public function forgetPasswordProses(Request $request)
  {
    // dd($request->email_kontak);
    $checkEmail = Validator::make(['email_kontak' => $request->email_kontak], [
      'email_kontak' => 'required|email'
    ]);
    // dd($checkEmail->passes());
    // $checkEmail = Str::checkEmail($request->email_kontak, '@');
    // dd($checkEmail);
    $chekEmailOrKontak = DB::table('users')->where($checkEmail->passes() == true ? 'email' : 'kontak', $request->email_kontak)->first();
    // dd($chekEmailOrKontak);

    if ($chekEmailOrKontak) {
      $token = Str::random(40);

      if ($checkEmail->passes() == true) {
        // dd($checkEmail);
        $data = [
          'email' => $chekEmailOrKontak->email,
          'token' => $token,
          'status' => 'ON',
          'created_at' => now()
        ];
        DB::table('password_reset_tokens')->insert($data);
        //email config

      } else {
        $data = [
          'kontak' => $chekEmailOrKontak->kontak,
          'token' => $token,
          'status' => 'ON',
          'created_at' => now()
        ];
        // dd($data);
        $insert =  DB::table('password_reset_tokens')->insert($data);
        if ($insert) {
          $reqData['kontak'] = $chekEmailOrKontak->kontak;
          $reqData['message'] = "Halo " . $chekEmailOrKontak->name . ",

Kami telah menerima permintaan untuk mereset kata sandi akun Anda. Untuk melanjutkan proses reset, silakan klik tautan di bawah ini:

" . url('/auth/reset-password-proses/' . $token . '') . "

Jika Anda tidak melakukan permintaan ini, Anda dapat mengabaikan email ini dengan aman. Namun, jika Anda merasa akun Anda telah dikompromikan, segera hubungi tim dukungan kami di support@contoh.com.

Terima kasih,
Tim Dukungan Contoh";
          // dd($reqData);
          Helpers::sendMessageAll($reqData);
          return redirect('/');
        }
      }
    }
    return back()->withInput()->withErrors([
      'email_kontak' => 'Masukan email atau kontak dengan benar!!',
      // 'password' => 'Wrong password',
    ]);
  }
  public function logout(Request $request)
  {
    $mmLogsData['activity'] = 'Logout berhasil dengan nama ' . request()->user()->name . '';
    $mmLogsData['detail'] = now();
    $mmLogsData['action'] = 'Login';
    Helpers::mmLogs($mmLogsData);
    DB::table('users')->where('id', request()->user()->id)->update(['active' => 'OFF']);
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }
}
