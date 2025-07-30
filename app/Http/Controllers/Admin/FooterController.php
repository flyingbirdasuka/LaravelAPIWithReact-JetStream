<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;


class FooterController extends Controller
{
    public function onSelectAll(){
    	$result = Footer::all();
    	return $result;
    }

    public function allFooter(){
    	$result = Footer::all();
    	return view('backend.footer.all_footer')->with('result', $result,);
    }

    public function editFooter($id){
    	$footer = Footer::findOrFail($id);
    	return view('backend.footer.edit_footer')->with('footer', $footer);
    }

    public function updateFooter(request $request, $id){
    	Footer::findOrFail($id)->update([
    		'address' => $request->address,
			'email' => $request->email,
			'phone' => $request->phone,
            'linkedin' => $request->linkedin, 
            'github' => $request->github, 
			'footer_credit' => $request->footer_credit,    		
    	]);
    	$notification = array(
            'message' => 'Footer updated!',
            'alert-type' => 'success'
        );
    	return redirect()->route('footer.all')->with($notification);
    }

    public function deleteFooter($id){
    	Footer::findOrFail($id)->delete();
    	$notification = array(
            'message' => 'Information deleted!',
            'alert-type' => 'success'
        );
    	return redirect()->back()->with($notification);
    }
}
