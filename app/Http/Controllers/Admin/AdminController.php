<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedStatusMail;
use App\Models\BackgroundImages;
use App\Models\ContactForm;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function PostsLists()
    {
        $this->data['posts'] = Post:: Select('posts.*', 'u.username')
            ->join('users as u', 'u.id', '=', 'posts.user_id')->get();
        return view($this->_viewPath . 'posts-list', $this->data);
    }

    public function Postsdestroy($id)
    {
        $this->data['posts'] = Post::find($id);
        $destination = $this->data['posts']->p_image;
        //code for remove old file
//        dd($destination);
        if (File::exists($destination)) {
            File::delete($destination);
        }


        $check = $this->data['posts']->delete();
        if ($check) {
            $msg = 'Post deleted successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = 'Post not deleted successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return back();

    }



    public function Bg()
    {
        $this->data['background'] = BackgroundImages::all();
        return view($this->_viewPath . 'backgroundimages.bg-list', $this->data);
    }

    public function createBg()
    {
        return view($this->_viewPath . 'backgroundimages.create-bg');
    }


    public function storeBg(Request $request)
    {

        $this->data['background'] = new BackgroundImages();
        if ($request->hasfile('auth_bg')) {
            //upload new file
            $file = $request->file('auth_bg');
            $path = 'images/';
//                $extension=$file->getClientOriginalExtension();
            $filename = $path . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);
            $this->data['background']->auth_bg = $filename;
        } else {

            $this->data['background']->auth_bg = 'images/default.png';
        }
        if ($request->hasfile('aboutus_bg')) {
            //upload new file
            $file = $request->file('aboutus_bg');
            $path = 'images/';
//                $extension=$file->getClientOriginalExtension();
            $filename = $path . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);
            $this->data['background']->aboutus_bg = $filename;
        } else {

            $this->data['background']->aboutus_bg = 'images/default.png';
        }


        $check = $this->data['background']->save();
        if ($check) {
            $msg = 'Background created successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = 'Background not created successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return back();
    }

    public function editBg($id)
    {
        $this->data['background'] = BackgroundImages::find($id);
        return view($this->_viewPath . 'backgroundimages.update-bg', $this->data);
    }

    public function updateBg(Request $request, $id)
    {

        $this->data['background'] = BackgroundImages::find($id);
        if ($request->hasfile('auth_bg')) {
            //code for remove old file
            $destination = $this->data['background']->auth_bg;
//            dd($destination);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            //upload new file
            $file = $request->file('auth_bg');
            $path = 'images/';
//                $extension=$file->getClientOriginalExtension();
            $filename = $path . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);
            $this->data['background']->auth_bg = $filename;
        }
        if ($request->hasfile('aboutus_bg')) {
            //code for remove old file
            $destination = $this->data['background']->aboutus_bg;
//            dd($destination);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            //upload new file
            $file = $request->file('aboutus_bg');
            $path = 'images/';
//                $extension=$file->getClientOriginalExtension();
            $filename = $path . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);
            $this->data['background']->aboutus_bg = $filename;
        }

        $check = $this->data['background']->update();
        if ($check) {
            $msg = 'background updated successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = 'background not updated successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return back();
    }


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
            $msg = "Approved successfully";

            Mail::send('backend.email.approved', [
                'name' => $this->data['user']->name,
                'email' => $this->data['user']->email,
            ],
                function ($displaymessage) {
                    $displaymessage->to($this->data['user']->email, 'GossipGirls')
//                        ->cc('knunez84@gmail.com')
                        ->subject('Account Approved');
                });

            return response()->json(array('statusCode' => 200, 'message' => $msg));
        } elseif ($this->data['user']->status == 0) {
            $msg = "Disapproved successfully";

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

