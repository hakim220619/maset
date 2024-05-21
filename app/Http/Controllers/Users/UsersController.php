<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users()
    {
        return view('content.users.user-list');
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
}
