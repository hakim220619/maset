<?php

namespace App\Http\Controllers\Bangunan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BangunanController extends Controller
{
    public function bangunan()
    {
        return view('content.object.bangunan.bangunan');
    }
    public function add_bangunan(Request $request) {
        $foto_tampak_depan = $request->file('foto_tampak_depan');
        $filename1 = $foto_tampak_depan->getClientOriginalName();
        $foto_tampak_depan->move(public_path('storage/images/bangunan'), $filename1);

        $foto_tampak_sisi_kiri = $request->file('foto_tampak_sisi_kiri');
        $filename2 = $foto_tampak_sisi_kiri->getClientOriginalName();
        $foto_tampak_sisi_kiri->move(public_path('storage/images/bangunan'), $filename2);

        $foto_tampak_sisi_kanan = $request->file('foto_tampak_sisi_kanan');
        $filename3 = $foto_tampak_sisi_kanan->getClientOriginalName();
        $foto_tampak_sisi_kanan->move(public_path('storage/images/bangunan'), $filename3);

        $foto_lainnya = $request->file('foto_lainnya');
        $filename4 = $foto_lainnya->getClientOriginalName();
        $foto_lainnya->move(public_path('storage/images/bangunan'), $filename4);

        $data = $request->except('_token');
        $data['foto_tampak_depan'] = $request->file('foto_tampak_depan')->getClientOriginalName();
        $data['foto_tampak_sisi_kiri'] = $request->file('foto_tampak_sisi_kiri')->getClientOriginalName();
        $data['foto_tampak_sisi_kanan'] = $request->file('foto_tampak_sisi_kanan')->getClientOriginalName();
        $data['foto_lainnya'] = $request->file('foto_lainnya')->getClientOriginalName();;
        $data['id_category'] = 1;
        $data['id_asset'] = $this->generateUniqueIdAsset();
        $data['created_at'] = now();

        DB::table('bangunan')->insert($data);

        return view('content.object.bangunan.bangunan');
    }
    public function generateUniqueIdAsset()
    {
        $latestAsset = DB::table('bangunan')
                          ->whereYear('created_at', Carbon::now()->year)
                          ->orderBy('id', 'desc')
                          ->first();

        $nextNumber = $latestAsset ? ((int) substr($latestAsset->id_asset, -4)) + 1 : 1;

        return '1' . Carbon::now()->year . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }    
}
