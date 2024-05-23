<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'nama',
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
        $data = DB::select('select ROW_NUMBER() OVER () AS no,  u.*, rs.rs_nama , ra.ra_nama ,r.role_nama  from users u, role_structure rs, role_access ra, role r 
        where u.role_structure=rs.rs_id 
        and u.role_access=ra.ra_id 
        and u.role=r.role_id 
        ORDER BY ROW_NUMBER() OVER () asc');
        return $data;
    }
    public static function getProfileById()
    {
        $data = DB::select('select u.*, rs.rs_nama , ra.ra_nama ,r.role_nama  from users u, role_structure rs, role_access ra, role r 
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
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'no_tlp' => $request->no,
                'alamat' => $request->alamat,
                'image' => $request->file('image')->getClientOriginalName(),
                'created_at' => now()
            ];
        } else {
            $data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'no_tlp' => $request->no,
                'alamat' => $request->alamat,
                'created_at' => now()
            ];
        }

        // dd($data);
        DB::table('users')->insert($data);
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
                'nama' => $request->nama,
                'email' => $request->email,
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'image' => $request->file('image')->getClientOriginalName(),
                'updated_at' => now()
            ];
        } else {
            $data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'updated_at' => now()
            ];
        }

        // dd($data);
        DB::table('users')->where('id', $request->id)->update($data);
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
                'nama' => $request->nama,
                'email' => $request->email,
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'image' => $request->file('image')->getClientOriginalName(),
                'updated_at' => now()
            ];
        } else {
            $data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'role_structure' => $request->role_structure,
                'role_access' => $request->role_access,
                'role' => $request->role,
                'status' => $request->status,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'updated_at' => now()
            ];
        }

        // dd($data);
        DB::table('users')->where('id', $request->id)->update($data);
    }
    public static function changePassword($request)
    {
        $data = [
            'password' => Hash::make($request->confirmPassword),
            'updated_at' => now()
        ];
        DB::table('users')->where('id', $request->id)->update($data);
    }
    public static function suspended($request)
    {
        $data = [
            'status' => 'SUSPENDED',
            'updated_at' => now()
        ];
        DB::table('users')->where('id', Auth::user()->id)->update($data);
    }
    public static function ProsesDeletusers($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }
}
