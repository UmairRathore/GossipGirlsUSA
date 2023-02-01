<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedStatusMail;
use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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


//    public function count(){
//        $usercount = User::where('role_id','=','2')->get();
//        $bloggercount = User::where('role_id','=','3')->get();
//        $postcount = User::all();
//
//        return view($this->_viewPath .'dashboard',compact( $postcount,$bloggercount,$usercount));
//    }

    public function show()
    {

        $this->data['user'] = $this->_model::where('role_id', '1')->get();
        return view($this->_viewPath . 'admin-list', $this->data);
    }

    public function showcontact()
    {

        $this->data['contact'] = ContactForm::all();
        return view($this->_viewPath . 'contact-list', $this->data);
    }


    public function showuser()
    {
        $this->data['user'] = $this->_model::where('role_id', '2')->get();
        return view($this->_viewPath . 'user-list', $this->data);
    }

    public function showblogger()
    {
        $this->data['user'] = $this->_model::where('role_id', '3')->get();
        return view($this->_viewPath . 'blogger-list', $this->data);
    }

    public function changeStatus(Request $request, $id)
    {
        $this->data['user'] = $this->_model::find($id);
        $this->data['user']->status = $request->status;
        $this->data['user']->save();
        if ($this->data['user']->status == 1) {
            $msg = "Blogger Approved successfully";

            Mail::send('backend.email.approved', [
                'name' => $this->data['user']->name,
                'email' => $this->data['user']->email,
            ],
                function ($displaymessage) {
                    $displaymessage->to('smalljutt420@gmail.com', 'GossipGirls')
                        ->subject('Account Approved');
                });

            return response()->json(array('statusCode' => 200, 'message' => $msg));
        } elseif ($this->data['user']->status == 0) {
            $msg = "Blogger Disapproved successfully";

            return response()->json(array('statusCode' => 200, 'message' => $msg));
        } else {
            $msg = trans('lang_data.error');
            return response()->json(array('statusCode' => 302, 'message' => $msg));
        }
    }

    public function destroy($id)
    {
        $this->data['user'] = $this->_model::find($id);
        if ($this->data['user']->role_id === 3) {
            $destination = $this->data['user']->user_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $check = $this->data['user']->delete();
            if ($check) {
                    $msg = 'Blogger deleted successfully';
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-success');
                } else {
                    $msg = 'Blogger not deleted successfully';
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-danger');
                }
                return back();
            }
            if ($this->data['user']->role_id === 2) {
                $destination = $this->data['user']->user_image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $check = $this->data['user']->delete();
                if ($check) {
                    $msg = 'User deleted successfully';
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-success');
                } else {
                    $msg = 'User not deleted successfully';
                    Session::flash('msg', $msg);
                    Session::flash('message', 'alert-danger');
                }
                return back();
            }
        }
}

