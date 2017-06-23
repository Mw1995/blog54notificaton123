<?php 
namespace App\Http\Controllers;
use App\User;
use App\role;
use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function getAdminPage()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }
    
    public function AssignRoles(Request $request)
    {

        $user = User::where('email', $request['email'])->first();
        $user->role()->detach();


        if ($request['scrum_master']) {
            $user->role()->attach(role::where('name', 'scrum master')->first());
        }

        if ($request['employee']) {
            $user->role()->attach(role::where('name', 'employee')->first());
        }
        return redirect()->back();
    }

    public function createUser(Request $request)
    {


        $user = new User();
        $user->name = $request['name'];
        $user->f_name = $request['fname'];
        $user->l_name = $request['lname'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        $user->role()->attach(role::where('name','employee')->first());

        redirect('/home');
    }

    public function show()
    {
        return view("auth.register");
    }
}