<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Messaging;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessagingController extends Controller
{
    //
    protected $_viewPath;
    protected $data = array();

    public function __construct()
    {
        $this->_model = new Messaging();
        $this->_model_user = new User();
        $this->setDefaultData();
    }

    private function setDefaultData()
    {
        $this->_viewPath = 'backend.pages.';
        $this->data['moduleName'] = 'Messages';
    }

    public function show()
    {
       if( Auth::guard('user')->check() && auth('user')->user()->role_id == 3)
       {

           $this->data['messages'] = $this->_model::select('messagings.*','u.username')
               ->where('messagings.sender_id','=',Auth()->user()->id)
//               ->orWhere('messagings.receiver_id','=',Auth()->user()->id)
               ->join('users as u','u.id','=','messagings.receiver_id')
               ->orderby('id','desc')
               ->get()
               ->unique('receiver_id');

//           $this->data['chat'] = $this->_model::where('messagings.sender_id','=',Auth()->user()->id)->get();

               return view('backend.pages.chat.chat-blogger',$this->data);
       }
       if (Auth::guard('user')->check() && auth('user')->user()->role_id == 2)
       {
//           $this->data['messages'] = Messaging::select('messagings.*','u.username')
////               ->leftjoin('users', function($join) {
//->join('users as u','u.id','=','messagings.sender_id')
//               // i want to join the users table with either of these columns
////                   $join->on('messagings.sender_id','=','users.id'); // i want to join the users table with either of these columns
////                   $join->orOn('messagings.receiver_id','=','users.id');
////               })
////               ->where(function ($query) {
////                   $query->where('messagings.sender_id','=',Auth()->user()->id)
////                       ->orWhere('messagings.receiver_id','=',Auth()->user()->id);})
//               ->get();
//           dd($messages);
//               return view('front.pages.chat.chat-user');

           $this->data['leftwallmessages'] = $this->_model::select('messagings.*','u.username')
               ->where('messagings.sender_id','=',Auth()->user()->id)
//               ->orWhere('messagings.receiver_id','=',Auth()->user()->id)
               ->join('users as u','u.id','=','messagings.receiver_id')
               ->orderby('id','desc')
               ->get()
               ->unique('receiver_id');
//
//           $this->data['chat'] = $this->_model::where('messagings.sender_id','=',Auth()->user()->id)
////               ->orWhere('messagings.receiver_id','=',Auth()->user()->id)
//               ->get();

//           foreach ($this->data['message'] as $id )
//           {
////               dd($id);
//               $this->data['messages'] =  Messaging::select('messagings.*','u.username')->where('receiver_id','=',$id->receiver_id)
//                   ->join('users as u','u.id','=','messagings.receiver_id')->get();
//           }
//               dd($this->data['message'] );
           return view('front.pages.chat.chat-user', $this->data);
//           dd( $this->data['messages'] );
       }

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'sender_id' => 'required',
                'receiver_id' => 'required',
                'message' => 'required',
            ]);
        //         'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        if ($validator->fails()) {
            return back()->with('required_fields_empty', 'FIll all the required fields!')
                ->withErrors($validator)
                ->withInput();
        }
        $this->data['messages'] = new Messaging();
        $this->data['messages']->sender_id=$request->sender_id;
        $this->data['messages']->receiver_id=$request->receiver_id;
        $this->data['messages']->message=$request->message;
        $this->data['messages']->save();

        return back();



    }
}
