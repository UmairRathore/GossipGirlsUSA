<?php

namespace App\Http\Controllers;

use App\Models\Contact_form;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    //

    public function create()
    {
        return view( 'front.pages.contact');
    }

    public function store(Request $request)
    {
//        dd($request);
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',

            ]);
        //         'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        if ($validator->fails()) {
            return back()->with('required_fields_empty', 'FIll all the required fields!')
                ->withErrors($validator)
                ->withInput();
        }

        $contact = new ContactForm();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
//        dd($contact);
        $check = $contact->save();
        if ($check) {
            $msg = 'Contact Form Submitted successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = 'Contact Form not submitted successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return back();
    }

    public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();

        $check = $contact->delete();
        if ($check) {
            $msg = 'Contact Info deleted successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-success');
        } else {
            $msg = 'Contact Info not deleted successfully';
            Session::flash('msg', $msg);
            Session::flash('message', 'alert-danger');
        }
        return back();
    }
}

