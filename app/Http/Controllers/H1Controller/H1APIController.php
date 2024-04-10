<?php

namespace App\Http\Controllers\H1Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class H1APIController extends Controller
{
    public function getUsers(Request $request){
        $room_no = $request['room_no'];
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        event(new Registered($users));

        return response()->json([
            'message' => 'success'
        ]);
    }
}
