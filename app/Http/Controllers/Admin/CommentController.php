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
//        if ($input['parent_id']==null)
//        {
//            $check = Comment::create($input);
//            if ($check) {
//                $msg = 'User deleted successfully';
//                Session::flash('msg', $msg);
//                Session::flash('replymessage');
//            }
//            return back();
//        }
        $check = Comment::create($input);
        $replyid = $check->id;
//        dd($replyid);
//        dd($check->parent_id);
        if ($check->parent_id!=null) {
            return back()->with('replymessage',$replyid);
        }
        elseif ($check->parent_id==null){
            Session::flash('message');
        return back();
        }
    }

//    public function store(Request $request)
//    {
//
//        try {
//            $request->validate
//            ([
//                'body' => 'required'
//            ]);
//            $input = $request->all();
//            $input['user_id'] = auth()->user()->id;
////
//            $comment = Comment::create($input);
//            if ($comment) {
////                return response()->json(['status' => true, 'message' => "Comment Successfully"]);
//                return response()->json(['status' => true, 'message' => 'Successful', 'comment' => $comment]);
////                return back();
//            }
//
//        } catch (Exception $e) {
//            return response()->json(['status' => false, 'message' => $e->getMessage()]);
//        }
//    }
}
