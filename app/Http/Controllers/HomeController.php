<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function register(){
        return view('auth.register');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $nowdate=Carbon::now();
        $posts =DB::table('_notification')->get();
        $users =DB::table('users')->get();
        $pendingtasknum=DB::table('tasks')->where('dt_planned_ended','>=',$nowdate)->count();
        return view('pages.chat',compact('posts','users','pendingtasknum'));
       
    }
    public function show()
    {   $nowdate=Carbon::now();
         $posts =DB::table('_notification')->get();
        $pendingtasknum=DB::table('tasks')->where('dt_planned_ended','>=',$nowdate)->count();
       return view('pages.calendar',compact('pendingtasknum','posts'));


    }
}
