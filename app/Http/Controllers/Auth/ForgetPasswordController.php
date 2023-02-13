<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{

    protected $_viewPath;
    protected $data = array();

    public function __construct()
    {
        $this->_model = new User();
        $this->setDefaultData();
    }

    private function setDefaultData()
    {
        $this->_viewPath = 'auth.';
        $this->data['moduleName'] = 'user';
    }
//    public function showForgetPasswordForm()
//    {
////        dd('121');
////        return view($this->_viewPath.'forgetPassword');
//        return view('auth.forgetPassword');
//    }
//
//
//    public function submitForgetPasswordForm(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|email|exists:users',
//        ]);
//
//        $token = Str::random(64);
//
//        DB::table('password_resets')->insert([
//            'email' => $request->email,
//            'token' => $token,
//            'created_at' => Carbon::now()
//        ]);
//
//        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
//            $message->to($request->email);
//            $message->subject('Reset Password');
//        });
//
//        return back()->with('message', 'We have e-mailed your password reset link!');
//    }
//
//    public function showResetPasswordForm($token) {
//        return view($this->_viewPath.'forgetPasswordLink', ['token' => $token]);
//    }
//
//
//    public function submitResetPasswordForm(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|email|exists:users',
//            'password' => 'required|string|min:6|confirmed',
//            'password_confirmation' => 'required'
//        ]);
//
//        $updatePassword = DB::table('password_resets')
//            ->where([
//                'email' => $request->email,
//                'token' => $request->token
//            ])
//            ->first();
//
//        if(!$updatePassword){
//            return back()->withInput()->with('error', 'Invalid token!');
//        }
//
//        $user = $this->_model::where('email', $request->email)
//            ->update(['password' => Hash::make($request->password)]);
//
//        DB::table('password_resets')->where(['email'=> $request->email])->delete();
//
//        return redirect('/login')->with('message', 'Your password has been changed!');
//    }
}
