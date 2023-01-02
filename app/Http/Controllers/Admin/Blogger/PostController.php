<?php

namespace App\Http\Controllers\Admin\Blogger;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
//        $this->data['posts'] = $this->_model::where('id',auth()->user()->id)->get;
        return view($this->_viewPath . 'posts-lists', $this->data);
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
        $this->data['posts']->blogger_id= auth()->user()->id;
        $this->data['posts']->title = $request->input('title');
        $this->data['posts']->description = $request->input('description');
        if ($request->hasfile('post_image')) {
            //upload new file
            $file = $request->file('post_image');
            $path = 'images/';
//                $extension=$file->getClientOriginalExtension();
            $filename = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $this->data['posts']->post_image = $filename;
        }
        else
        {

            $this->data['posts']->post_image = 'default-image.png';
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

}
