<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $this->_viewPath = 'backend.pages.';
        $this->data['moduleName'] = 'User';
    }

    public function show()
    {

        $this->data['user'] = $this->_model::where('role_id', '1')->get();
//        dd($this->data['user']);
        return view($this->_viewPath . 'admin-list', $this->data);
    }


    public function showuser()
    {
        $this->data['user'] = $this->_model::select('users.first_name','users.first_name','users.email')->where('role_id', '2')->get();
        return view($this->_viewPath . 'user-list', $this->data);
    }

    public function showblogger()
    {
        $this->data['user'] = $this->_model::where('role_id','3')->get();
        return view($this->_viewPath . 'blogger-list', $this->data);
    }

    public function changeStatus(Request $request, $id)
    {
        $this->data['user'] = $this->_model::find($id);
        $this->data['user']->status = $request->status;
        $check = $this->data['user']->save();
        if ($check) {
            $msg = "Status updated successfully";
//            Session::flash('msg', $msg);
//            Session::flash('message', 'alert-success');

            return response()->json(array('statusCode' => 200, 'message' => $msg));

        } else {
            $msg = trans('lang_data.error');
//            Session::flash('msg', $msg);
//            Session::flash('message', 'alert-danger');
            return response()->json(array('statusCode' => 302, 'message' => $msg));
        }
    }

//    public function changeStatus(Request $request)
//    {
//        $this->data['user'] = $this->_model::find($request->id);
//        $this->data['user']->status = $request->status;
//        $this->data['user']->save();
//
//        return response()->json(['success'=>'Status change successfully.']);
//    }
}
