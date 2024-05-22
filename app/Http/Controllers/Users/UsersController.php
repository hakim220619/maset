<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users()
    {
        $data['total_rs'] = User::where('role_structure', '!=', '0')->count();
        $data['total_ra'] = User::where('role_access', '!=', '0')->count();
        $data['total_r'] = User::where('role', '!=', '0')->count();
        $data['status_on'] = User::where('status', 'ON')->count();
        return view('content.users.user-list', $data);
    }
    function userList()
    {
        $data = User::GetListuser();
        return response()->json([
            'success' => true,
            'message' => 'Data Class',
            'data' => $data,
        ]);
    }

    function addProses(Request $request)
    {
        // dd($request->all());
        User::ProsesAddUsers($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Data Add Userss Successs',
        ]);
    }
    function deleteProses($id)
    {
        // dd($id);
        User::ProsesDeletusers($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Data Add Userss Successs',
        ]);
    }
    function editProses(Request $request)
    {
        User::ProsesEditUsers($request);
        toast('', 'success');
        return redirect()->route('profile')->with('success', 'Users Successs Updateed!');
    }
}
