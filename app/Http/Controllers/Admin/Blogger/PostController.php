<?php

namespace App\Http\Controllers\Admin\Blogger;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Stevebauman\Location\Facades\Location;

class PostController extends Controller
{

    //
    protected $_viewPath;
    protected $data = array();

    public function __construct()
    {
        $this->_model = new Post();
        $this->setDefaultData();
    }

    private function setDefaultData()
    {
        $this->_viewPath = 'backend.pages.posts.';
        $this->data['moduleName'] = 'posts';

    }

    public function show()
    {

        $this->data['posts'] = $this->_model::where('user_id', '=',auth()->user()->id)->get();
        return view($this->_viewPath . 'posts-list', $this->data);
    }

    public function create()
    {
        return view($this->_viewPath . 'create-posts');
    }


    public function store(Request $request)
    {



        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        //         'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        if ($validator->fails()) {
            return back()->with('required_fields_empty', 'FIll all the required fields!')
                ->withErrors($validator)
                ->withInput();
        }


        $this->data['posts'] = $this->_model;
        $this->data['posts']->user_id = auth()->user()->id;
        $this->data['posts']->zipcode = auth()->user()->zipcode;
        $this->data['posts']->title = $request->input('title');
        $this->data['posts']->description = $request->input('description');
        if ($request->hasfile('post_image')) {
            //upload new file
            $file = $request->file('post_image');
            $path = 'images/';
//                $extension=$file->getClientOriginalExtension();
            $filename = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $filename);

            ImageOptimizer::optimize($filename);
//            dd($file);
            $this->data['posts']->post_image = $filename;
        } else {

            $this->data['posts']->post_image = 'images/default.png';
        }


        $check = $this->data['posts']->save();
        if ($check) {
            $msg = 'Post created successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = 'posts not created successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return back();
    }

    public function edit($id)
    {
        $this->data['posts'] = $this->_model::find($id);
        return view($this->_viewPath . 'update-posts', $this->data);
    }


    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        //         'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        if ($validator->fails()) {
            return back()->with('required_fields_empty', 'FIll all the required fields!')
                ->withErrors($validator)
                ->withInput();
        }

        $this->data['posts'] = $this->_model::find($id);
//        $this->data['posts']->user_id = auth()->user()->id;
        $this->data['posts']->title = $request->input('title');
        $this->data['posts']->description = $request->input('description');
        if ($request->hasfile('post_image')) {
            //code for remove old file
            $destination = $this->data['posts']->post_image;
//            dd($destination);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            //upload new file
            $file = $request->file('post_image');
            $path = 'images/';
//                $extension=$file->getClientOriginalExtension();
            $filename = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $this->data['posts']->post_image = $filename;
        }

        $check = $this->data['posts']->update();
        if ($check) {
            $msg = 'Post updated successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = 'posts not updated successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return back();
    }

    //
    public function destroy($id)
    {
        $this->data['posts'] = $this->_model::find($id);
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

}
