<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneralModel extends Model
{
    use HasFactory;

    public static function GetListRoleStructure()
    {
        $data = DB::select('select ROW_NUMBER() OVER () AS no, rs.* from role_structure rs where 1=1
        ORDER BY ROW_NUMBER() OVER () asc');
        return $data;
    }
    public static function ProsesAddRoleStructure($request)
    {

        $data = [
            'rs_nama' => $request->rs_nama,
            'rs_status' => 'ACTIVE',
            'rs_created_at' => now()
        ];
        DB::table('role_structure')->insert($data);
    }

    public static function ProsesUpdateRoleStructure($request)
    {

        $data = [
            'rs_nama' => $request->rs_nama,
            'rs_status' => $request->rs_status,
            'rs_created_at' => now()
        ];
        // dd($data);
        DB::table('role_structure')->where('rs_id', $request->rs_id)->update($data);
    }

    public static function ProsesDeletRoleStructure($id)
    {
        DB::table('role_structure')->where('rs_id', $id)->delete();
    }
}
