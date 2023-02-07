<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    //
    protected $_viewPath;
    protected $data = array();

    public function __construct()
    {
        $this->_model = new Post();
        $this->_usermodel = new User();
        $this->setDefaultData();
    }

    private function setDefaultData()
    {
        $this->_viewPath = 'front.pages.';
        $this->data['moduleName'] = 'posts';
    }

    public function aboutus(Request $request)
    {

        if (auth()->check()) {
//                    $me = $request->ip();   //get IP
            $me = '206.217.224.86';  //get IP
            $ip = Location::get($me); //get zipcode from location
            $zipcode = $ip->zipCode;  //save zipcode


            $this->data['randomPosts'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
//                ->where('u.role_id', '=', '3')
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->inRandomOrder()
                ->limit(3)
                ->get();
            foreach($this->data['randomPosts'] as $post)
            {
                $this->data['commentcount'] = $this->_model::
                Select('posts.*', 'u.username')
                    ->join('comments as c','c.post_id','=','posts.id')
                    ->where('posts.id', $post->id)
                    ->where('c.parent_id',null)
                    ->count();

            }
            return view($this->_viewPath . 'about-us', $this->data);
        }else{
            $this->data['randomPosts'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->inRandomOrder()
                ->limit(3)
                ->get();
            foreach($this->data['randomPosts'] as $post)
            {
                $this->data['commentcount'] = $this->_model::
                Select('posts.*', 'u.username')
                    ->join('comments as c','c.post_id','=','posts.id')
                    ->where('posts.id', $post->id)
                    ->where('c.parent_id',null)
                    ->count();

            }

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


            $this->data['randomposts'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
//                ->where('u.role_id', '=', '3')
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->inRandomOrder()
                ->limit(5)
                ->get();

            foreach($this->data['randomposts'] as $post)
            {
                $this->data['commentcount'] = $this->_model::
                Select('posts.*', 'u.username')
                    ->join('comments as c','c.post_id','=','posts.id')
                    ->where('posts.id', $post->id)
                    ->where('c.parent_id',null)
                    ->count();

            }



            $this->data['checkthispost'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
//                ->where('u.role_id', '=', '3')
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->inRandomOrder()
                ->limit(1)
                ->get();



            $this->data['randomslidesinglepost'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->inRandomOrder()
                //to check logged in Users Zipcode
                ->where('posts.zipcode', '=', $zipcode)
                //
                ->limit(3)
                ->get();

            $this->data['latest'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('posts.zipcode', '=', $zipcode)
                ->latest()
                ->first();

            //either use get query (instead of first())
//            if post > 0 and not empty conditions
//            or use isset()

            return view($this->_viewPath . 'index', $this->data);

        }

        else{

            $this->data['randomposts'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                ->inRandomOrder()
                ->limit(5)
                ->get();
            foreach($this->data['randomposts'] as $post)
            {
                $this->data['commentcount'] = $this->_model::
                Select('posts.*', 'u.username')
                    ->join('comments as c','c.post_id','=','posts.id')
                    ->where('posts.id', $post->id)
                    ->where('c.parent_id',null)
                    ->count();

            }


            $this->data['checkthispost'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->where('u.role_id', '=', '3')
                ->inRandomOrder()
                ->limit(1)
                ->get();

            $this->data['randomslidesinglepost'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->inRandomOrder()
                ->limit(3)
                ->get();

            $this->data['latest'] = $this->_model::
            Select('posts.*', 'u.username')
                ->join('users as u', 'u.id', '=', 'posts.user_id')
                ->latest()
                ->first();
            return view($this->_viewPath . 'index', $this->data);

        }

    }

    public function singlePost($id)
    {

        $this->data['singlepost'] = $this->_model::
        Select('posts.*', 'u.username')
            ->join('users as u', 'u.id', '=', 'posts.user_id')
            ->where('posts.id', $id)
            ->get();

        $this->data['commentcount'] = $this->_model::
        Select('posts.*', 'u.username')
            ->join('comments as c','c.post_id','=','posts.id')
            ->where('posts.id', $id)
            ->where('c.parent_id',null)
            ->count();


        return view($this->_viewPath . 'single-post', $this->data);
    }



    public function edit($id)
    {
        $this->data['user'] = $this->_usermodel::find($id);
        return view($this->_viewPath . 'user-profile', $this->data);
    }


    public function update(Request $request, $id)
    {
//        dd($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => '',
        ]);
        $user = $this->_usermodel::find($id);
//        dd($user->id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        if ($request->password)
        {
            $user->password = bcrypt($request->password);
        }

//        $user->password = hash::make($request->password);
//        dd($user);
        $check = $user->update();
        if ($check) {
            $msg =" Profile Updated successfully";
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = trans('lang_data.error');
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return redirect()->back();
    }


    public function search(Request $request)
    {

        if (auth()->check()) {
//                    $me = $request->ip();   //get IP
            $me = '206.217.224.86';  //get IP
            $ip = Location::get($me); //get zipcode from location
            $zipcode = $ip->zipCode;  //save zipcode
            $search = $request->query('search');
            $this->data['search'] = Post::where('zipcode',$zipcode)->where('title', 'Like', "%{$search}%")
                ->orderBy('id', 'DESC')
                ->paginate(5);

            $this->data['post'] = Post::all();
        }
        else
        {
            $search = $request->query('search');
            $this->data['search'] = Post::where('title', 'Like', "%{$search}%")
                ->orderBy('id', 'DESC')
                ->paginate(5);

            $this->data['post'] = Post::all();
        }
//        dd($this->data['search']);
        return view($this->_viewPath . 'search', $this->data);
    }


    public function BloggerPosts($id)
    {
        $this->data['posts'] = Post:: Select('posts.*', 'u.username')
            ->join('users as u', 'u.id', '=', 'posts.user_id')
            ->where('posts.user_id', '=', $id)
//            ->where('u.username', '=', $name)
            ->get();
//        dd($this->data['posts']);
        return view($this->_viewPath . 'posts-list', $this->data);
    }

}
