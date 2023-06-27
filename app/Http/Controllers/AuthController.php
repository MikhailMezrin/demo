<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        if (!($name && $email && $password)) {
            return response()->json(['status' => 'error', 'message' => $name." \n ".$email." \n ".$password], 417);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['status' => 'error', 'message' => 'You must enter a valid email'], 417);
        }

        if (strlen($password) < 6) {
            return response()->json(['status' => 'error', 'message' => 'Password should be min 6 character'], 417);
        }

        if (User::where('email', '=', $email)->exists()) {
            return response()->json(['status' => 'error', 'message' => 'User with this email already exists'], 417);
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = app('hash')->make($request->password);

            if ($user->save()) {
                return view('mainPage');
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
        return response()->json(['error' => 'Something gone wrong'], 401);
    }

    public function selectUser()
    {
    $users = User::all()->sortBy('name');
    return view('selectUserForm', compact('users'));
    }    
}
