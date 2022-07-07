<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chart;

class ChartController extends Controller
{
    public function onSelectAll(){
    	$result = Chart::all();
    	return $result;
    }

    public function allChart(){
    	$result = Chart::all();
    	return view('backend.chart.all_chart')->with('result', $result,);
    }

    public function addChart(){
    	return view('backend.chart.add_chart');
    }

    public function storeChart(Request $request){
    	Chart::insert([
    		'technology' => $request->technology,
			'projects' => $request->projects,	
    	]);
    	$notification = array(
            'message' => 'Chart added!',
            'alert-type' => 'success'
        );
    	return redirect()->route('chart.all')->with($notification);
    }

    public function editChart($id){
    	$chart = Chart::findOrFail($id);
    	return view('backend.chart.edit_chart')->with('chart', $chart);
    }

    public function updateChart(request $request, $id){
    	Chart::findOrFail($id)->update([
    		'technology' => $request->technology,
			'Projects' => $request->projects,			
    	]);
    	$notification = array(
            'message' => 'Chart content updated!',
            'alert-type' => 'success'
        );
    	return redirect()->route('chart.all')->with($notification);
    }

    public function deleteChart($id){
    	Chart::findOrFail($id)->delete();
    	$notification = array(
            'message' => 'Chart content deleted!',
            'alert-type' => 'success'
        );
    	return redirect()->back()->with($notification);
    }
}
