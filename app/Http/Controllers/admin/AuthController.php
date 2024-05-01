<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_request(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Validate if the email exists in the 'admins' table
        $validator = Validator::make($request->all(), [
            'email' => 'exists:admins,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Provide a valid email'
            ]);
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return response()->json([
                'success' => true,
                'message' => 'Welcome to Admin Panel'
            ]);
        }
        else
        {
            if(Admin::query()->where('email',$request->email)->count() > 0){
                return response()->json([
                    'success' => false,
                    'message' => 'Password you entered is Incorrect'
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Email is Invalid'
                ]);
            }
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('admin_login');
    }
}
