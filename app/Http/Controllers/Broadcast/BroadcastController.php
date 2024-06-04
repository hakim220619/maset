<?php

namespace App\Http\Controllers\Broadcast;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    function broadcast()
    {
        $data['users'] = User::GetListuser();
        $data['title'] = "Broadcast";
        return view('content.broadcast.broadcast', $data);
    }
    function sendMessage(Request $request)
    {
        $data = Helpers::sendMessage($request);
        return response()->json([
            'success' => true,
            'message' => 'Send Whatsapp Success',
            'data' => json_decode($data),
        ]);
    }
}
