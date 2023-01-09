<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
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
            $ip = '182.178.222.128';
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

//            $me = '182.178.222.128';


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
            return redirect()->back()->with('alert', 'Incorrect Details');

        }

    }
}
