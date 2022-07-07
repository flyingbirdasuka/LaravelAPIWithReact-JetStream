<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;

class PortfolioController extends Controller
{
    public function onSelectFour(){
    	$result = Portfolio::limit(4)->get();
    	return $result;
    }

    public function onSelectAll(){
    	$result = Portfolio::all();
    	return $result;
    }

    public function onSelectDetails($portfolioId){
     $id = $portfolioId;
     $result = Portfolio::where('id', $id)->get();
     return $result;
    }

    public function allPortfolio(){
        $result = Portfolio::all();
        return view('backend.portfolio.all_portfolio')->with('result', $result,);
    }

    public function addPortfolio(){
        return view('backend.portfolio.add_portfolio');
    }

    public function storePortfolio(Request $request){
        $request->validate([
            'short_title' => 'required',
            'short_description' => 'required',
            'small_img' => 'required',       
        ], [
            'short_title.required' => 'Input Short Title',
            'short_description.required' => 'Input Short Description',
        ]);

        $image = $request->file('small_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(512, 512)->save('upload/portfolio/'. $name_gen); 
        $save_url = 'http://udemy-rapi.test/upload/portfolio/' . $name_gen;
        Portfolio::insert([
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'small_img'  => $save_url, 
            'long_title'  => $request->long_title,  
            'long_description'  => $request->long_description,   
            'total_duration'  => $request->total_duration, 
            'total_lecture'  => $request->total_lecture, 
            'total_student'  => $request->total_student, 
            'skill_all'  => $request->skill_all,  
            'video_url'  => $request->video_url,    
        ]);

        $notification = array(
            'message' => 'portfolio added!',
            'alert-type' => 'success'
        );
        return redirect()->route('portfolio.all')->with($notification);
    }

    public function editPortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('backend.portfolio.edit_portfolio')->with('portfolio', $portfolio);
    }

    public function updatePortfolio(Request $request, $id){
        if($request->file('small_img')){
            $image = $request->file('small_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(512, 512)->save('upload/portfolio/'. $name_gen); 
            $save_url = 'http://udemy-rapi.test/upload/portfolio/' . $name_gen;

            Portfolio::findOrFail($id)->update([
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'small_img'  => $save_url, 
                'long_title'  => $request->long_title,  
                'long_description'  => $request->long_description,   
                'total_duration'  => $request->total_duration, 
                'total_lecture'  => $request->total_lecture, 
                'total_student'  => $request->total_student, 
                'skill_all'  => $request->skill_all,  
                'video_url'  => $request->video_url,      
            ]);
        }else{
            Portfolio::findOrFail($id)->update([
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_title'  => $request->long_title,  
                'long_description'  => $request->long_description,   
                'total_duration'  => $request->total_duration, 
                'total_lecture'  => $request->total_lecture, 
                'total_student'  => $request->total_student, 
                'skill_all'  => $request->skill_all,  
                'video_url'  => $request->video_url,      
            ]);
        }   
        $notification = array(
            'message' => 'portfolio updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('portfolio.all')->with($notification);
    }

    public function deletePortfolio($id){
        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'portfolio  deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
