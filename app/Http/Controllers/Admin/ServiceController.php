<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Image;

class ServiceController extends Controller
{
    public function serviceView(){
    	$result = Services::latest()->get();
    	return $result;
    }

    public function allService(){
    	$result = Services::all();
    	return view('backend.service.all_service')->with('result', $result,);
    }

    public function addService(){
    	return view('backend.service.add_service');
    }

    public function storeService(Request $request){
    	$request->validate([
    		'service_name' => 'required',
			'service_description' => 'required',
			'service_logo' => 'required',		
    	], [
    		'service_name.required' => 'Input Service Name',
    		'service_description.required' => 'Input Service Description',
    	]);

    	$image = $request->file('service_logo');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(512, 512)->save('upload/service/'. $name_gen); 
    	$save_url = 'http://udemy-rapi.test/upload/service/' . $name_gen;
    	Services::insert([
    		'service_name' => $request->service_name,
			'service_description' => $request->service_description,
			'service_logo' => $save_url,		
    	]);

    	$notification = array(
            'message' => 'Service added!',
            'alert-type' => 'success'
        );
    	return redirect()->route('service.all')->with($notification);
    }

    public function editService($id){
    	$service = Services::findOrFail($id);
    	return view('backend.service.edit_service')->with('service', $service);
    }

    public function updateService(Request $request, $id){
    	if($request->file('service_logo')){
    		$image = $request->file('service_logo');
	    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	    	Image::make($image)->resize(512, 512)->save('upload/service/'. $name_gen); 
	    	$save_url = 'http://udemy-rapi.test/upload/service/' . $name_gen;

	    	Services::findOrFail($id)->update([
	    		'service_name' => $request->service_name,
				'service_description' => $request->service_description,
				'service_logo' => $save_url,		
	    	]);
	    }else{
	    	Services::findOrFail($id)->update([
	    		'service_name' => $request->service_name,
				'service_description' => $request->service_description,		
	    	]);
	    }	
    	$notification = array(
            'message' => 'Service updated!',
            'alert-type' => 'success'
        );
    	return redirect()->route('service.all')->with($notification);
    }

    public function deleteService($id){
    	Services::findOrFail($id)->delete();
    	$notification = array(
            'message' => 'Service  deleted!',
            'alert-type' => 'success'
        );
    	return redirect()->back()->with($notification);
    }
}
