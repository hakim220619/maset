<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function users()
    {
        $data['total_users'] = Auth::user()->role_structure != 4 ? User::where('role_structure', Auth::user()->role_structure)->count() : User::all()->count();
        $data['status_active'] = Auth::user()->role_structure != 4 ? User::where('status', 'ACTIVE')->where('role_structure', Auth::user()->role_structure)->count() : User::where('status', 'ACTIVE')->count();
        $data['status_inactive'] = Auth::user()->role_structure != 4 ? User::where('status', 'INACTIVE')->where('role_structure', Auth::user()->role_structure)->count() : User::where('status', 'INACTIVE')->count();
        $data['status_suspended'] = Auth::user()->role_structure != 4 ? User::where('status', 'SUSPENDED')->where('role_structure', Auth::user()->role_structure)->count() : User::where('status', 'SUSPENDED')->count();
        return view('content.users.user-list', $data);
    }
    function userList()
    {
        $data = User::GetListuser();
        return response()->json([
            'success' => true,
            'message' => 'Data',
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
            'message' => 'Add Userss Successs',
        ]);
    }
    function editProses(Request $request)
    {
        User::ProsesEditUsers($request);
        toast('', 'success');
        return redirect()->route('profile')->with('success', 'Users Successs Updateed!');
    }
    function updateProses(Request $request)
    {
        User::ProsesUpdateUsers($request);
        return response()->json([
            'success' => true,
            'message' => 'Update Users Successs',
        ]);
    }
    function deleteProses($id)
    {
        // dd($id);
        User::ProsesDeletusers($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Delete Userss Successs',
        ]);
    }
    function resetPassword($id)
    {
        // dd($id);
        User::prosesResetPassword($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Reset Password Successs',
        ]);
    }
}
