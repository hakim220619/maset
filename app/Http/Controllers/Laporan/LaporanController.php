<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan() {
        $object = DB::select("SELECT bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category FROM bangunan UNION SELECT tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category FROM tanah_kosong UNION SELECT retail.nama_bangunan,retail.nia, retail.lat, retail.long,retail.alamat, retail.id_category FROM retail");
        $coordinates = DB::select("SELECT bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category FROM bangunan UNION SELECT tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category FROM tanah_kosong UNION SELECT retail.nama_bangunan,retail.nia, retail.lat, retail.long,retail.alamat, retail.id_category FROM retail");
        // dd($object);
        return view('content.laporan.laporan',compact('object', 'coordinates'));
    }
    public function getCoordinates(Request $request) {
        $object = DB::select("SELECT bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category FROM bangunan UNION SELECT tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category FROM tanah_kosong UNION SELECT retail.nama_bangunan,retail.nia, retail.lat, retail.long,retail.alamat, retail.id_category FROM retail");
        $coordinates = DB::select("SELECT bangunan.nama_bangunan,bangunan.nia, bangunan.lat, bangunan.long,bangunan.alamat, bangunan.id_category FROM bangunan UNION SELECT tanah_kosong.nama_bangunan,tanah_kosong.nia, tanah_kosong.lat, tanah_kosong.long,tanah_kosong.alamat, tanah_kosong.id_category FROM tanah_kosong UNION SELECT retail.nama_bangunan,retail.nia, retail.lat, retail.long,retail.alamat, retail.id_category FROM retail");
        

        return response()->json(['object' => $object, 'coordinates' => $coordinates]);
    }
}
