<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class LoginController extends Controller
{
    //

    public function logout()
    {
        $check = Auth::guard('user')->logout();
        if ($check == null) {
            return redirect('login');
        }

    }

    public function login()
    {
        $data['active'] = '';
        if (Auth::guard('user')->check() && auth('user')->user()->role_id == 1) {
            return redirect('/dashboard');
//            echo 'admin';
        } elseif (Auth::guard('user')->check() && auth('user')->user()->role_id == 2) {
            return redirect('/');
//            echo 'user';
        } elseif (Auth::guard('user')->check() && auth('user')->user()->email == 3) {
            return Redirect::to('dashboard');
//            echo 'blogger';
        }
        return view('auth.login');
    }


    function postLogin(Request $request)
    {


        $email = $request->email;
        $password = $request->password;


        if (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], true) && auth('user')->user()->role_id == 1) {
//            echo 'admin';

            return redirect('dashboard');


        } elseif (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], true) && auth('user')->user()->role_id == 2) {

            //Login With Zipcode
//            $ip = $request->ip();
            $ip = '206.217.224.86';
//            dd($ip);
            if ($ip !== null) {
                $location = Location::get($ip);
//                dd($location->zipCode);
                $userId = \auth()->user()->id;
//                dd($userId);
                $updateUserZipCode = User::find($userId);
                $updateUserZipCode->zipcode = $location->zipCode;
                $updateUserZipCode->save();
//                dd($updateUserZipCode->zipcde);
//                $check = $updateUserZipCode->save();
//                if ($check)
//                {
                return Redirect::to(URL::previous());
//                }


//            $me = '206.217.224.86';


//                dd($ip->zipCode);
            }

            //SimpleLogin
//            return Redirect::to(URL::previous());

        } elseif (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], true) && auth('user')->user()->role_id == 3) {
//            return 0;
            if (Auth::User()->status == 0) {
                $check = Auth::guard('user')->logout();
//                dd($check);
                if ($check == null) {
                    $msg = "Your are not approved by admin, till now please contact to support";
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-success');
                } else {
                    $msg = trans('lang_data.error');
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-danger');
                }
                return redirect('login');

            } else {
                return redirect('dashboard');
            }
        } else {


            if (!\auth()->user()) {
                $msg = "Your credentials do not match our record, Please try again.";
                Session::flash('msg', $msg);
                Session::flash('message', 'alert-success');
            } else {
                $msg = trans('lang_data.error');
                Session::flash('msg', $msg);
                Session::flash('message', 'alert-danger');
            }
            return redirect()->back();

        }

    }


    public function showForgetPasswordForm()
    {
//        dd('121');
//        return view($this->_viewPath.'forgetPassword');
        return view('auth.forgetPassword');
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('backend.email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) {
//        return view($this->_viewPath.'forgetPasswordLink', ['token' => $token]);
        return view('auth.forgetpassLink', ['token' => $token]);
    }


    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
