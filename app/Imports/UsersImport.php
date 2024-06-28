<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // dd($row);
        // try {
        // header('Access-Control-Allow-Origin: *');

        ini_set('max_execution_time', 0);
        return new User([
            'uid' => Str::random(40) . date('Hms'),
            'nik' => $row['nik'],
            'password' => Hash::make(12345678),
            'email' => $row['email'],
            'name' => $row['name'],
            'status' => 'INACTIVE',
            'kontak' => $row['kontak'],
            'created_at' => now()

        ]);
        // } catch (Exception $e) {
        //     //throw $th;
        //     return response([
        //         'success' => false,
        //         'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
        //     ]);
        // }
    }
}
