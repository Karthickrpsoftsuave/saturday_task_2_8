<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;
class RegisterController extends Controller

{
    public function register()
    {
        return view('auth.register');
    }
    public function storeUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($data);
        $data['password'] = Hash::make($data['password']);
        $newuser = UserDetail::create($data);
        return redirect(route('login'));
    }

    public function login()
    {
        return view('auth.login');
    }
    public function logincheck(Request $request)
{
    // Validate the incoming request
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = UserDetail::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Store user information in the session
        session(['user_id' => $user->id, 'user_email' => $user->email]);

        // Redirect to the dashboard
        return redirect()->route('dashboard')->with('success', 'Login successful');
    }

    return redirect()->back()->withErrors('Invalid credentials');
}

    public function logout(Request $request)
    {
        session()->flush(); // Clears all session data
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.forgetpassword');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user_details,email',
        ]);

        // Generate a unique token
        $token = Str::random(60);

        // Store token in the password_resets table (create migration if needed)
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        // Send email (customize as needed)
        $resetLink = url('/reset-password/' . $token);
        SendEmailJob::dispatch($request->email, $resetLink);


        return back()->with('status', 'Reset link sent to your email.');
    }
    public function showResetForm($token)
    {
        return view('auth.resetpassword', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user_details,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        // Check if token is valid
        $resetRecord = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();
        if (!$resetRecord) {
            return back()->withErrors(['email' => 'Invalid reset token.']);
        }
         
        // Update user password
        $user = UserDetail::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
               
        // Delete reset token
        DB::table('password_resets')->where('email', $request->email)->delete();
        return redirect()->route('login')->with('success', 'Password updated successfully.');
    }
}

