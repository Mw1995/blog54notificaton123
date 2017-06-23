<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;

use DB;
use App\project;

class projectController extends Controller
{
  

   public function show(){

    $proj=DB::table('projects')->get();
	return view('pages.showproject',compact('proj'));
}



public function store(Request $request){

     $project= new project;
     $project->name=$request->name;
     $project->dt_created=$request->dt_created;
     $project->dt_ended=$request->dt_ended;
     $project->description=$request->description;



     $project->save();
     redirect()->action('projectController@show')->withInput();

     return back();

	
}


public function edit(project $project){
    return view('pages.editproject', compact('project'));


}





}
