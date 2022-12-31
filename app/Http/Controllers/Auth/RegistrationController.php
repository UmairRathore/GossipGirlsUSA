<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
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
//        $this->data['moduleName'] = 'User';
    }

    public function user()
    {
        return view($this->_viewPath.'registration');
    }
    public function blogger()
    {
        return view($this->_viewPath.'bloggerregisteration');
    }



    public function userregistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = $this->_model;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
//        $user->password = hash::make($request->password);
        $user->password = bcrypt($request->password);
        $user->role_id = '2';
//        dd($user);
        $user->save();
        $check = $user->save();

        $name = $user->first_name.' '.$user->last_name;
        if ($check) {
            $msg = $name.' Registered successfully, You can Comment and Reply';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = trans('lang_data.error');
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return redirect()->back();
//        return redirect()->route('backend.user');
    }


    public function bloggerregistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required|min:5|integer',
            'state' => 'required',
            'time_in_community' => 'required',
            'description' => 'required',
        ]);
        $user = $this->_model;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->zipcode = $request->input('zipcode');
        $user->state = $request->input('state');
        $user->time_in_community = $request->input('time_in_community');
        $user->description = $request->input('description');
        $user->role_id = '3';
        //        dd($user);
        $user->save();
        $check = $user->save();

        $name = $user->first_name.' '.$user->last_name;
        if ($check) {
            $msg = $name." Registered successfully, Please wait 24 hours for verification mail";
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = trans('lang_data.error');
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return redirect()->back();
    }

    public function dashboard()

    {
//        if (Auth::check()) {
            return view('backend.pages.dashboard');
//        }
//        return redirect("registration")->withSuccess('Opps! You do not have access');
    }

}

