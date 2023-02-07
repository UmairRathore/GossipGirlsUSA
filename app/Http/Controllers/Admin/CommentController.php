<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function Faker\Provider\pt_BR\check_digit;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $check = Comment::create($input);
        $replyid = $check->id;

        if ($check->parent_id!=null) {
            return back()->with('replymessage',$replyid);
        }
        elseif ($check->parent_id==null){
            Session::flash('message');
        return back();
        }
    }

}
