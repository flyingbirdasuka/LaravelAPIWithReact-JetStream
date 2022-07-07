<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function onContactSent(Request $request){
        $contactArray = json_decode($request->getContent(), true);
        $name = $contactArray['name'];
        $email = $contactArray['email'];
        $message = $contactArray['message'];
    	$result = Contact::insert([
    		'name' => $name,
    		'email' => $email,
    		'message' => $message,
    	]);
    	if($result){
    		return 'Message sent successfully!';
    	}else{
    		return 'Something went wrong';
    	}
    }

    public function allMessage(){
        $result = Contact::all();
        return view('backend.message.all_message')->with('result', $result,);
    }

    public function deleteMessage($id){
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
