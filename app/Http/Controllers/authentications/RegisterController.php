<?php

namespace App\Http\Controllers\authentications;

use App\Helpers\Helpers;
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

    $input = $request->all();
    $rules = [
      'name' => 'required|max:64',
      'email' => 'required|email|max:255|unique:users,email, ' . $request->email,
      'nik' => 'required|unique:users,nik,' . $request->nik
    ];

    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return redirect('/auth/register-view')->withErrors($validator)->withInput();
    } else {
      $request['message'] = "*Aktivasi Akun Pengguna*
Halo " . $request->name . ",

Kami senang memberitahu Anda bahwa akun Anda telah berhasil dibuat di platform kami. Untuk melanjutkan, Anda perlu mengaktifkan akun Anda dengan langkah-langkah berikut:

1. Klik Tautan Aktivasi: [Tambahkan tautan aktivasi di sini]

2. Verifikasi Informasi Anda: Setelah mengklik tautan di atas, Anda akan diarahkan untuk memverifikasi informasi pribadi Anda.

3. Mulai Menggunakan Akun Anda: Setelah verifikasi selesai, Anda dapat masuk dan mulai menikmati layanan kami.

Jika Anda mengalami kesulitan atau memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi tim dukungan kami melalui email di [alamat email dukungan] atau melalui [nomor telepon dukungan].

Terima kasih telah bergabung dengan kami!

Salam,
[Tim Dukungan]";
      Helpers::sendMessageAll($request);
      toast('', 'success');
      return redirect('/')->with('success', 'Users Successs Added!');
    }
  }
}