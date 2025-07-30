<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function onSelectAll(){
    	$result = Information::all();
    	return $result;
    }

    public function allInformation(){
    	$result = Information::all();
    	return view('backend.information.all_information')->with('result', $result,);
    }

    public function addInformation(){
    	return view('backend.information.add_information');
    }

    public function storeInformation(Request $request){
    	Information::insert([
    		'about' => $request->about,  		
    	]);
    	$notification = array(
            'message' => 'Information added!',
            'alert-type' => 'success'
        );
    	return redirect()->route('information.all')->with($notification);
    }

    public function editInformation($id){
    	$information = Information::findOrFail($id);
    	return view('backend.information.edit_information')->with('information', $information);
    }

    public function updateInformation(request $request, $id){
    	Information::findOrFail($id)->update([
    		'about' => $request->about,		
    	]);
    	$notification = array(
            'message' => 'Information updated!',
            'alert-type' => 'success'
        );
    	return redirect()->route('information.all')->with($notification);
    }

    public function deleteInformation($id){
    	Information::findOrFail($id)->delete();
    	$notification = array(
            'message' => 'Information deleted!',
            'alert-type' => 'success'
        );
    	return redirect()->back()->with($notification);
    }
}
