<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BangunanModel extends Model
{
    use HasFactory;
    public static function bangunanLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, b.* 
FROM bangunan b, object_category oc 
WHERE b.id_category=oc.id 
AND b.id_category = 1
 ORDER BY ROW_NUMBER() OVER () asc');
        return $data;
    }
    public static function tanahKosongLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, b.* 
FROM retail b, object_category oc 
WHERE b.id_category=oc.id 
AND b.id_category = 3
 ORDER BY ROW_NUMBER() OVER () asc');
        return $data;
    }
    public static function retailLoadData()
    {
        $data = DB::select('SELECT ROW_NUMBER() OVER () AS no, b.* 
FROM tanah_kosong b, object_category oc 
WHERE b.id_category=oc.id 
AND b.id_category = 2
 ORDER BY ROW_NUMBER() OVER () asc');
        return $data;
    }
}
