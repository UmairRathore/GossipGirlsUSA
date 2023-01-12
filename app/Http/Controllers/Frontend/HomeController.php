<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
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
        $this->_viewPath = 'front.pages.';
        $this->data['moduleName'] = 'posts';
    }

    public function aboutus()
    {

        if (auth()->check()) {
            //        $me = $request->ip();   //get IP
            $me = '206.217.224.86';  //get IP
            $ip = Location::get($me); //get zipcode from location
            $zipcode = $ip->zipCode;  //save zipcode


            $this->data['randomPosts'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->inRandomOrder()
                ->limit(3)
                ->get();
            return view($this->_viewPath . 'about-us', $this->data);
        }else{
            $this->data['randomPosts'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                ->inRandomOrder()
                ->limit(3)
                ->get();
            return view($this->_viewPath . 'about-us', $this->data);
        }

    }

    public function show(Request $request)
    {
//       $ip = $request->ip();
//        dd($ip);


        if (auth()->check()) {

//        $me = $request->ip();   //get IP
            $me = '206.217.224.86';  //get IP
            $ip = Location::get($me); //get zipcode from location
            $zipcode = $ip->zipCode;  //save zipcode

//        dd($ip);


            $this->data['randomposts'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->inRandomOrder()
                ->limit(5)
                ->get();

//            $check =$this->data['randomposts']->first();
//            dd($check);

            $this->data['checkthispost'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->inRandomOrder()
                ->limit(1)
                ->get();
//        dd($this->data['posts']);


            $this->data['randomsinglepost'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->inRandomOrder()
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->limit(3)
                ->get();

            $this->data['latest'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('posts.zipcode', '=', $zipcode)
                ->latest()
                ->first();

            return view($this->_viewPath . 'index', $this->data);

        }

        else{

            $this->data['randomposts'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                ->inRandomOrder()
                ->limit(5)
                ->get();


            $this->data['checkthispost'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                ->inRandomOrder()
                ->limit(1)
                ->get();

            $this->data['randomsinglepost'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->inRandomOrder()
                ->limit(3)
                ->get();

            $this->data['latest'] = $this->_model::
            Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->latest()
                ->first();
            return view($this->_viewPath . 'index', $this->data);

        }

    }

    public function singlePost($id)
    {

        $this->data['singlepost'] = $this->_model::
        Select('posts.*', 'u.first_name as fname', 'u.last_name as lname')
            ->join('users as u', 'u.id', '=', 'posts.user_id')
            ->where('posts.id', $id)
            ->get();
//        dd($this->data['singlepost']->id);

//        dd($this->data['randompost']);


        return view($this->_viewPath . 'single-post', $this->data);
    }


}
