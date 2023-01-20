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

//    public function store(Request $request)
//    {
//        $request->validate([
//            'body' => 'required',
//        ]);
//
//        $input = $request->all();
//        $input['user_id'] = auth()->user()->id;
//
//        Comment::create($input);
//
//        return back();
//    }

    public function store(Request $request)
    {

        try {
            $request->validate
            ([
                'body' => 'required'
            ]);
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
//
            $comment = Comment::create($input);
            if ($comment) {
//                return response()->json(['status' => true, 'message' => "Comment Successfully"]);
//                return response()->json(['status' => true, 'message' => 'Successful', 'comment' => $comment]);
                echo $comment;
            }

        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
