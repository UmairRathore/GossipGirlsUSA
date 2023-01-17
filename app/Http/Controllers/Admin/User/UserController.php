<?php

namespace App\Http\Controllers\Admin\User;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    protected $_viewPath;
    protected $data = array();

    public function __construct()
    {
        $this->_model = new User();
        $this->setDefaultData();
    }

    private function setDefaultData()
    {
        $this->_viewPath = 'backend.';
        $this->data['moduleName'] = 'User';
    }

    public function show()
    {
        $this->data['user'] = $this->_model::where('role_id', '=', '2');
        return view($this->_viewPath . 'user', $this->data);
    }

    public function edit($id)
    {
        $this->data['user'] = $this->_model::find($id);
        return view($this->_viewPath . 'user', $this->data);
    }


    public function update(Request $request, $id)
    {
//        dd($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
//            'password' => '',
//            'phone_number' => '',
//            'address' => '',
//            'city' => '',
//            'zipcode' => '',
//            'state' => '',
//            'time_in_community' => '',
//            'description' => '',
        ]);
        $user = $this->_model::find($id);
//        dd($user->id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        if ($request->password)
        {
            $user->password = bcrypt($request->password);
        }
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->zipcode = $request->input('zipcode');
        $user->state = $request->input('state');
        $user->time_in_community = $request->input('time_in_community');
        $user->description = $request->input('description');
//        $user->password = hash::make($request->password);
//        dd($user);
        $check = $user->update();
        if ($check) {
            $msg = " Profile Updated successfully";
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
