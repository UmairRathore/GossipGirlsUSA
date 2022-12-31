<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    //

//    public function login()
//    {
//        return view('auth.login');
//    }
    public function logout()
    {
        $check =Auth::guard('user')->logout();
        if($check==null) {
            return redirect('login');
//            echo 'admin';
//            return Redirect::to(Url::'/login');
        }



    }

    public function login()
    {
//        return view('auth.login');
        $data['active'] = '';
        if (Auth::guard('user')->check() && auth('user')->user()->role_id == 1) {
//                return redirect('/dashboard');
//            echo 'admin';
        } elseif (Auth::guard('user')->check() && auth('user')->user()->role_id == 2) {
                return redirect('/');
//            echo 'user';
        }
        elseif (Auth::guard('user')->check() && auth('user')->user()->role_id == 3) {
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

            return redirect('dashboard');
        } elseif (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], true) && auth('user')->user()->role_id == 2) {
             return Redirect::to(URL::previous());
//                        return redirect('/');
        }
        elseif (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], true) && auth('user')->user()->role_id == 3) {
//            return 0;
            if(Auth::user()->status==0)
            {
                $check= Auth::guard('user')->logout();
//                dd($check);
                if ($check==null) {
                    $msg = "Your are not approved by admin, till now please contact to support";
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-success');
                } else {
                    $msg = trans('lang_data.error');
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-danger');
                }
                return redirect('login');

            }
            else
            {
                return redirect('dashboard');
            }
            // return Redirect::to(URL::previous());
            // return Redirect::to('dashboard');
//            return redirect('dashboard');
//            echo 'blogger';
        } else {
            return redirect()->back()->with('alert', 'Incorrect Details');

        }

    }
}
