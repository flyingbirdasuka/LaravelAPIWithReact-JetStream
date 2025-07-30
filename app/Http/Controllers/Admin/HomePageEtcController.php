<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageEtc;

class HomePageEtcController extends Controller
{
    public function selectVideo(){
    	$result = HomePageEtc::select('video_description','video_url')->get();
    	return $result;
    }

    public function selectTotalHome(){
    	$result = HomePageEtc::select('total_student', 'total_course', 'total_review')->get();
    	return $result;
    }

    public function selectTechHome(){
    	$result = HomePageEtc::select('tech_description')->get();
    	return $result;
    }

    public function selectHomeTitle(){
    	$result = HomePageEtc::select('home_title', 'home_subtitle')->get();
    	return $result;
    }

    public function allHomeContent(){
        $result = HomePageEtc::all();
        return view('backend.home.all_homecontent')->with('result', $result,);
    }

    public function addHomeContent(){
        return view('backend.home.add_homecontent');
    }

    public function storeHomeContent(Request $request){
        $request->validate([
            'home_title' => 'required',
            'home_subtitle' => 'required',   
        ], [
            'shome_title.required' => 'Input Home Title',
            'home_subtitle.required' => 'Input Home Subtitle',
        ]);
        HomePageEtc::insert([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'tech_description' => $request->tech_description,     
        ]);
        $notification = array(
            'message' => 'Home Content added!',
            'alert-type' => 'success'
        );
        return redirect()->route('homecontent.all')->with($notification);
    }

    public function editHomeContent($id){
        $homecontent = HomePageEtc::findOrFail($id);
        return view('backend.home.edit_homecontent')->with('homecontent', $homecontent);
    }

    public function updateHomeContent(request $request, $id){
        HomePageEtc::findOrFail($id)->update([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'tech_description' => $request->tech_description,     
        ]);
        $notification = array(
            'message' => 'Home Content updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('homecontent.all')->with($notification);
    }

    public function deleteHomeContent($id){
        HomePageEtc::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Home Content deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
