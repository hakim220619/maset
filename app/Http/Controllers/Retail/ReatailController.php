<?php

namespace App\Http\Controllers\Retail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReatailController extends Controller
{
    public function retail()
    {
        return view('content.object.retail.retail');
    }
    public function add_retail(Request $request) {
        $foto_tampak_depan = $request->file('foto_tampak_depan');
        $filename1 = $foto_tampak_depan->getClientOriginalName();
        $foto_tampak_depan->move(public_path('storage/images/retail'), $filename1);

        $foto_tampak_sisi_kiri = $request->file('foto_tampak_sisi_kiri');
        $filename2 = $foto_tampak_sisi_kiri->getClientOriginalName();
        $foto_tampak_sisi_kiri->move(public_path('storage/images/retail'), $filename2);

        $foto_tampak_sisi_kanan = $request->file('foto_tampak_sisi_kanan');
        $filename3 = $foto_tampak_sisi_kanan->getClientOriginalName();
        $foto_tampak_sisi_kanan->move(public_path('storage/images/retail'), $filename3);

        $foto_lainnya = $request->file('foto_lainnya');
        $filename4 = $foto_lainnya->getClientOriginalName();
        $foto_lainnya->move(public_path('storage/images/retail'), $filename4);

        $data = $request->except('_token');
        $data['foto_tampak_depan'] = $request->file('foto_tampak_depan')->getClientOriginalName();
        $data['foto_tampak_sisi_kiri'] = $request->file('foto_tampak_sisi_kiri')->getClientOriginalName();
        $data['foto_tampak_sisi_kanan'] = $request->file('foto_tampak_sisi_kanan')->getClientOriginalName();
        $data['foto_lainnya'] = $request->file('foto_lainnya')->getClientOriginalName();;
        $data['id_category'] = 3;
        $data['created_at'] = now();

        DB::table('retail')->insert($data);

        return view('content.object.retail.retail');
    }
}
