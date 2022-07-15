<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
     public function onSelectAll(){
    	$result = Education::all();
    	return $result;
    }

    public function allEducation(){
    	$result = Education::all();
    	return view('backend.education.all_education')->with('result', $result,);
    }

    public function addEducation(){
    	return view('backend.education.add_education');
    }

    public function storeEducation(Request $request){
    	Education::insert([
    		'title' => $request->title,
    		'schoolname' => $request->schoolname,
    		'year' => $request->year,
			'description' => $request->description,
    	]);

    	$notification = array(
            'message' => 'education added!',
            'alert-type' => 'success'
        );
    	return redirect()->route('education.all')->with($notification);
    }

    public function editEducation($id){
    	$education = Education::findOrFail($id);
    	return view('backend.education.edit_education')->with('education', $education);
    }

    public function updateEducation(Request $request, $id){
    	Education::findOrFail($id)->update([
	    		'title' => $request->title,
	    		'schoolname' => $request->schoolname,
	    		'year' => $request->year,
				'description' => $request->description,
		]);	
    	$notification = array(
            'message' => 'education updated!',
            'alert-type' => 'success'
        );
    	return redirect()->route('education.all')->with($notification);
    }

    public function deleteEducation($id){
    	Education::findOrFail($id)->delete();
    	$notification = array(
            'message' => 'education  deleted!',
            'alert-type' => 'success'
        );
    	return redirect()->back()->with($notification);
    }

}
