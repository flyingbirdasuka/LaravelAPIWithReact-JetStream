<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;
use Image;

class ClientReviewController extends Controller
{
    public function onSelectAll(){
    	$result = ClientReview::all();
    	return $result;
    }

    public function allReview(){
        $result = ClientReview::all();
        return view('backend.review.all_review')->with('result', $result,);
    }

    public function addReview(){
        return view('backend.review.add_review');
    }

    public function storeReview(Request $request){
        $request->validate([
            'client_title' => 'required',
            'client_description' => 'required', 
            'client_img'  => 'required'
        ], [
            'client_title.required' => 'Input Client Title',
            'client_description.required' => 'Input Client Description',
        ]);
        $image = $request->file('client_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(512, 512)->save('upload/review/'. $name_gen); 
        $save_url = 'http://udemy-rapi.test/upload/review/' . $name_gen;
        ClientReview::insert([
            'client_title' => $request->client_title,
            'client_description' => $request->client_description,
            'client_img' => $save_url,     
        ]);
        $notification = array(
            'message' => 'Review added!',
            'alert-type' => 'success'
        );
        return redirect()->route('review.all')->with($notification);
    }

    public function editReview($id){
        $review = ClientReview::findOrFail($id);
        return view('backend.review.edit_review')->with('review', $review);
    }

    public function updateReview(request $request, $id){
    	if($request->file('client_img')){
    		$image = $request->file('client_img');
	        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(512, 512)->save('upload/review/'. $name_gen); 
	        $save_url = 'http://udemy-rapi.test/upload/review/' . $name_gen;
	        ClientReview::findOrFail($id)->update([
	            'client_title' => $request->client_title,
	            'client_description' => $request->client_description,
	            'client_img' => $save_url,     
	        ]);
    	}else {
    		ClientReview::findOrFail($id)->update([
	            'client_title' => $request->client_title,
	            'client_description' => $request->client_description,
	        ]);
    	}
        
        $notification = array(
            'message' => 'Review updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('review.all')->with($notification);
    }

    public function deleteReview($id){
        ClientReview::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Home Content deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
