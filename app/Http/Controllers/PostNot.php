<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Notifications\AddPost;
use DB;
use Route;
//use App\Notifications\Compose;
//use Illuminate\Notifications\Notification;
use Notification;
use Carbon\Carbon;
  
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;

class PostNot extends Controller
{
    public function index(){
       $posts =DB::table('_notification')->get();
       $users =DB::table('users')->get();
       return view('pages.chat',compact('posts','users'));


    }
public function create(){

        return view('pages.chat');

    }


public function store(Request $request){
  $post=new Post();
   //dd($request->all());
   $post->title=$request->title;
   $post->description=$request->description;
   $post->view=0;

   if ($post->save())
   {  
    $user=User::all();
    Notification::send($user,new AddPost($post));
    $title=$post->title;
    $description=$post->description;
    $from=auth()->user()->name;
    $time=Carbon::now()->diffForHumans();

    $data=['description'=>$description,'title'=>$title,'By'=>$from,'time'=>$time];
    StreamLabFacades::pushMessage('scrum','AddPost',$data);




   }
   




  // 
   
   return  redirect()->route('chat');  
    }

public function seen(){


        foreach(auth()->user()->unreadNotifications as $note){
            $note->markAsRead();
                  }




}


}
