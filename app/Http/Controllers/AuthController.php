<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidateException;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $recaptchaResponse = $request->input('g-recaptcha-response');
        $recaptchaSecret = '6Ld4yO8nAAAAAIRs3P9bR8HLUZmLgrg3amxSweUd';

        $recaptchaVerifyResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse
        ]);

        if (!$recaptchaVerifyResponse->json()['success'])
        {
            return response()->json([
                'status' => false,
                'message' => 'Please complete the reCAPCTCHA challenge.'
            ], 400);
        }

        if(Auth::attempt($credentials))
        {
            $user = Auth::user();

            if($user->isAdmin)
            {
                $role = 'admin';

                return response()->json([
                    'status' => true,
                    'message' => "Logged In Successfully",
                    'currentusername' => $user->username,
                    'role' => $role
                ], 200);
            }
            else
            {
                $role = 'user';

                return response()->json([
                    'status' => false,
                    'message' => "Access denied, not authorized as admin.",
                    'role' => $role
                ], 400);
            }
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => "Invalid Credentials",
            ], 400);
        }
    }

    // logout
    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
    
            return response()->json([
                'status' => true,
                'message' => 'Successfully logged out.'
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'Already Logged Out'
            ], 400);
        } 
    }

    // change password
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:4|different:current_password',
            'confirm_password' => 'required|same:new_password'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 400);
        }

        if(!Hash::check($request->input('current_password'), $user->password))
        {
            // throw ValidationException::withMessages([
            //     'current_password' => ['Current password is incorrect.']
            // ]);
            return response()->json([
                'status' => false,
                'message' => 'Current Password is incorrect.'
            ], 400);
        }

        try {
            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'password' => Hash::make($request->input('new_password'))
            ]);
            
            return response()->json([
                'status' => 'true',
                'message' => 'Password updated successfully.',
            ], 200);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'Could not update password.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
        


    }

}
