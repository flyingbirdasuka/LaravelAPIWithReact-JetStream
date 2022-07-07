<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Image;

class ProjectController extends Controller
{
    public function onSelectThree(){
    	$result = Projects::limit(3)->get();
    	return $result;
    }

    public function onSelectAll(){
    	$result = Projects::all();
    	return $result;
    }

    public function onSelectDetails($projectId){
        $id = $projectId;
        $result = Projects::where('id', $id)->get();
        return $result;
    }

    public function allProject(){
        $result = Projects::all();
        return view('backend.project.all_project')->with('result', $result);
    }

    public function addProject(){
        return view('backend.project.add_project');
    }

    public function storeProject(Request $request){
        $request->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'img_one' => 'required',       
        ], [
            'project_name.required' => 'Input Project Name',
            'sproject_description.required' => 'Input Project Description',
        ]);

        $img_one = $request->file('img_one');
        $name_gen_one = hexdec(uniqid()).'.'.$img_one->getClientOriginalExtension();
        Image::make($img_one)->resize(626, 417)->save('upload/project/'. $name_gen_one); 
        $save_url_one = 'http://udemy-rapi.test/upload/project/' . $name_gen_one;

        $img_two = $request->file('img_two');
        $name_gen_two = hexdec(uniqid()).'.'.$img_two->getClientOriginalExtension();
        Image::make($img_two)->resize(540, 607)->save('upload/project/'. $name_gen_two); 
        $save_url_two = 'http://udemy-rapi.test/upload/project/' . $name_gen_two;
        
        Projects::insert([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,  
            'img_two' => $save_url_two,       
        ]);

        $notification = array(
            'message' => 'Project added!',
            'alert-type' => 'success'
        );
        return redirect()->route('project.all')->with($notification);
    }

    public function editProject($id){
        $project = Projects::findOrFail($id);
        return view('backend.project.edit_project')->with('project', $project);
    }

    public function updateProject(Request $request, $id){
        if($request->file('img_one')){
            $img_one = $request->file('img_one');
            $name_gen = hexdec(uniqid()).'.'.$img_one->getClientOriginalExtension();
            Image::make($img_one)->resize(626, 417)->save('upload/project/'. $name_gen); 
            $save_url_one = 'http://udemy-rapi.test/upload/project/' . $name_gen;
            $img_two = $request->file('img_two');
            $name_gen = hexdec(uniqid()).'.'.$img_two->getClientOriginalExtension();
            Image::make($img_two)->resize(540, 607)->save('upload/project/'. $name_gen); 
            $save_url_two = 'http://udemy-rapi.test/upload/project/' . $name_gen;

            Projects::findOrFail($id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,
                'img_one' => $save_url_one,  
                'img_two' => $save_url_two,       
            ]);
        }else{
            Projects::findOrFail($id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,    
            ]);
        }   
        $notification = array(
            'message' => 'Project updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('project.all')->with($notification);
    }

    public function deleteProject($id){
        Projects::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Service  deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
