<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\forgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;





class ForgotPasswordController extends Controller
{
   


    
     public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }
   

  
}









  /*use SendsPasswordResetEmails;*/














  /*$user = User::where('email', $request->email)->count();
        if ($user > 0) 
        {
         
            $user = User::where('email', $request->email)->first();
           $user->save();
            // Send email with the reset link
           Mail::to($user ->email)->send(new SendsPasswordResetEmails ($user));
            return response()->json(['message' => 'Password reset link sent to your email.'], 200);
            
        } 
        else {
            return response()->json(['error' => 'Email not found.'], 404);
        }*/