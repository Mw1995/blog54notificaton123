<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class TasksController extends Controller
{
    function show(){
    	$id=Auth::user()->id;
    	 $nowdate=Carbon::now();	
    // $proj=DB::table('projects')->get();
     $task=DB::table('tasks')->where('user_id',$id)->get();
     $pendingtasknum=DB::table('tasks')->where([['status','pending'],['tasks.user_id',$id],])->count();
     $inprogresstasknum=DB::table('tasks')->where([['status','in progress'],['tasks.user_id',$id],])->count();
     $completedtasknum=DB::table('tasks')->where([['status','completed'],['tasks.user_id',$id],])->count();
     $failedtasknum=DB::table('tasks')->where([['status','failed'],['tasks.user_id',$id],])->count();
     $deliveredtasknum=DB::table('tasks')->where([['status','delivered'],['tasks.user_id',$id],])->count();
     // $projuser=DB::table('project_user')->where('user_id', $id)->value('project_id');
     $users=DB::table('users')->join('project_user','users.id','=','project_user.user_id')->get();
	return view('pages.showtask',compact('task','pendingtasknum','deliveredtasknum','failedtasknum','inprogresstasknum','users','completedtasknum'));
}
function markasaccepted(Request $t)
{  
	$task_id=$t['task_id'];
  $task=DB::table('tasks')->where('id',$task_id)->update(['status'=>'in progress']);

}
function markasdeclined(Request $t)
{  
	$task_id=$t['task_id'];
  $task=DB::table('tasks')->where('id',$task_id)->update(['status'=>'declined']);

}

function store()
{ 
  $taskname=request('tasktitle');; 
  $userid= request('user_id');
  $planned_ended_date=request('taskdate');
  $nowdate=Carbon::now(); 
  $task=DB::table('tasks')->insertGetId(['user_id'=>$userid,'dt_planned_ended'=>$planned_ended_date,'dt_created'=>$nowdate,'status'=>'pending','sprint_id'=>1,'taskname'=>$taskname]);
 return redirect('/task');
}


function delete()
{  $task_id=request('task_id');
   DB::table('tasks')->where('id',  $task_id)->delete();
    return redirect('/task');
}

}
