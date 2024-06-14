<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Mockery\Undefined;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_access',
        'role_structure',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public static function GetListuser()
    {
        if (Auth::user()->role_structure != Helpers::getRoleStructureJson()[3]) {
            if (Auth::user()->role_structure == 32 || Auth::user()->role_structure == 33 || Auth::user()->role_structure == 34) {
                $data = DB::select('select ROW_NUMBER() OVER () AS no,  u.*, rs.rs_name,
            IF(u.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=u.role_access) ) as ra_name, 
            IF(u.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=u.role) ) as role_name 
            from users u, role_structure rs
            where u.role_structure=rs.rs_id 
            and rs.rs_name like  "%' . self::getProfileById()->rs_name . '%"
            ORDER BY ROW_NUMBER() OVER () asc');
            } else {
                $data = DB::select('select ROW_NUMBER() OVER () AS no,  u.*, rs.rs_name,
            IF(u.role_access = null, "", (SELECT ra.ra_name FROM role_access ra WHERE ra.ra_id=u.role_access) ) as ra_name, 
            IF(u.role = null, "", (SELECT r.role_name FROM role r WHERE r.role_id=u.role) ) as role_name 
            from users u, role_structure rs
            where u.role_structure=rs.rs_id 
            and rs.rs_id =  "' . self::getProfileById()->role_structure . '"
            ORDER BY ROW_NUMBER() OVER () asc');
            }
        } else {
            $data = DB::select('select ROW_NUMBER() OVER () AS no,  u.*, rs.rs_name , ra.ra_name ,r.role_name  from users u, role_structure rs, role_access ra, role r 
            where u.role_structure=rs.rs_id 
            and u.role_access=ra.ra_id 
            and u.role=r.role_id 
            ORDER BY ROW_NUMBER() OVER () asc');
        }
        return $data;
    }
    public static function getProfileById()
    {
        $data = DB::select('select u.*, rs.rs_name , ra.ra_name ,r.role_name  from users u, role_structure rs, role_access ra, role r 
        where u.role_structure=rs.rs_id 
        and u.role_access=ra.ra_id 
        and u.role=r.role_id 
        and id = ' . Auth::user()->id . '');
        return $data[0];
    }
    public static function ProsesAddUsers($request)
    {
        // dd($request);
        if ($request['image'] != null) {
            $image = $request->file('image');
            // dd($getImage->image);
            $filename = $image->getClientOriginalName();
            $image->move(public_path('storage/images/users'), $filename);
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'image' => $request->file('image')->getClientOriginalName(),
                'created_at' => now()
            ];
        } else {
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'created_at' => now()
            ];
        }
        DB::table('users')->insert($data);
        $mmLogsData['activity'] = 'ProsesAddUsers berhasil';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Insert';
        Helpers::mmLogs($mmLogsData);
    }
    public static function ProsesAddUsersRegister($request)
    {
        // dd($request);
        if ($request['image'] != null) {
            $image = $request->file('image');
            // dd($getImage->image);
            $filename = $image->getClientOriginalName();
            $image->move(public_path('storage/images/users'), $filename);
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_structure' => $request->role_structure,
                'status' => 'INACTIVE',
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'image' => $request->file('image')->getClientOriginalName(),
                'created_at' => now()
            ];
        } else {
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_structure' => $request->role_structure,
                'status' => 'INACTIVE',
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'created_at' => now()
            ];
        }
        DB::table('users')->insert($data);
        $mmLogsData['activity'] = 'ProsesAddUsersRegister berhasil';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Insert';
        Helpers::mmLogs($mmLogsData);
    }
    public static function ProsesEditUsers($request)
    {
        // dd($request);
        if ($request['image'] != null) {
            $getImage = DB::table('users')->where('id', $request->id)->first();
            $file_path = public_path() . '/storage/images/users/' . $getImage->image;
            File::delete($file_path);
            $image = $request->file('image');
            // dd($getImage->image);
            $filename = $image->getClientOriginalName();
            $image->move(public_path('storage/images/users'), $filename);
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'image' => $request->file('image')->getClientOriginalName(),
                'updated_at' => now()
            ];
        } else {
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,

                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'updated_at' => now()
            ];
        }
        // dd($data);
        DB::table('users')->where('id', $request->id)->update($data);

        $mmLogsData['activity'] = 'ProsesEditUsers berhasil dengan id ' . $request->id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        // dd($mmLogsData);
        Helpers::mmLogs($mmLogsData);
    }
    public static function ProsesUpdateUsersBeforeLogin($request)
    {
        // dd($request);
        $data = [
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_structure' => $request->role_structure,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'active' => 'OFF',
            'updated_at' => now()
        ];

        // dd($data);
        DB::table('users')->where('id', $request->id)->update($data);
        $mmLogsData['activity'] = 'ProsesUpdateUsersBeforeLogin berhasil dengan id ' . $request->id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        // dd($mmLogsData);
        Helpers::mmLogs($mmLogsData);
    }
    public static function ProsesUpdateUsers($request)
    {
        // dd($request->all());
        if ($request->image != 'undefined') {
            $getImage = DB::table('users')->where('id', $request->id)->first();
            $file_path = public_path() . '/storage/images/users/' . $getImage->image;
            File::delete($file_path);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('storage/images/users'), $filename);
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'image' => $request->file('image')->getClientOriginalName(),
                'updated_at' => now()
            ];
        } else {
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'updated_at' => now()
            ];
        }
        DB::table('users')->where('id', $request->id)->update($data);
        $mmLogsData['activity'] = 'ProsesUpdateUsers berhasil dengan id ' . $request->id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
    }
    public static function changePassword($request)
    {
        $data = [
            'password' => Hash::make($request->confirmPassword),
            'updated_at' => now()
        ];
        DB::table('users')->where('id', $request->id)->update($data);
        $mmLogsData['activity'] = 'changePassword berhasil dengan id ' . $request->id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
    }
    public static function suspended($request)
    {
        $data = [
            'status' => 'SUSPENDED',
            'updated_at' => now()
        ];
        DB::table('users')->where('id', Auth::user()->id)->update($data);
        $mmLogsData['activity'] = 'suspended berhasil dengan id ' . $request->id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Update';
        Helpers::mmLogs($mmLogsData);
    }
    public static function ProsesDeletusers($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
        $mmLogsData['activity'] = 'ProsesDeletusers berhasil dengan id ' . $id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Delete';
        Helpers::mmLogs($mmLogsData);
    }
    public static function prosesResetPassword($id)
    {
        $data = DB::table('users')->where('id', $id)->update(['password' => Hash::make(12345678)]);
        $mmLogsData['activity'] = 'prosesResetPassword berhasil dengan id ' . $id . '';
        $mmLogsData['detail'] = $data;
        $mmLogsData['action'] = 'Delete';
        Helpers::mmLogs($mmLogsData);
    }
}
