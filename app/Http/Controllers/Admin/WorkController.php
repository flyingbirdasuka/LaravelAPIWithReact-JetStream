<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function onSelectAll(){
    	$result = Work::all();
    	return $result;
    }

    public function allwork(){
    	$result = Work::all();
    	return view('backend.work.all_work')->with('result', $result,);
    }

    public function addWork(){
    	return view('backend.work.add_work');
    }

    public function storeWork(Request $request){
    	$request->validate([
    		'title' => 'required',
    	], [
    		'title.required' => 'Input Title',
    	]);


    	Work::insert([
    		'title' => $request->title,
    		'year' => $request->year,
			'description' => $request->description,
    	]);

    	$notification = array(
            'message' => 'work added!',
            'alert-type' => 'success'
        );
    	return redirect()->route('work.all')->with($notification);
    }

    public function editWork($id){
    	$work = Work::findOrFail($id);
    	return view('backend.work.edit_work')->with('work', $work);
    }

    public function updateWork(Request $request, $id){
    	Work::findOrFail($id)->update([
	    		'title' => $request->title,
	    		'year' => $request->year,
				'description' => $request->description,
		]);	
    	$notification = array(
            'message' => 'work updated!',
            'alert-type' => 'success'
        );
    	return redirect()->route('work.all')->with($notification);
    }

    public function deleteWork($id){
    	Work::findOrFail($id)->delete();
    	$notification = array(
            'message' => 'work  deleted!',
            'alert-type' => 'success'
        );
    	return redirect()->back()->with($notification);
    }
}
