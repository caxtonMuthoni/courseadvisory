<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome(){
        if(Auth::user()->role != 1){
            return redirect()->route('home');
         }
        return view('admin.home');
    }

    public function allusers(){
        if(Auth::user()->role != 1){
            return redirect()->route('home');
         }
        $users = User::all();
        return view("admin.users.all")->with("users",$users);
    }
    
    public function users(){
        if(Auth::user()->role != 1){
            return redirect()->route('home');
         }
        $users = User::all();
        return view("admin.users.users")->with("users",$users);
    }

    public function destroy($id){
        if(Auth::user()->role != 1){
            return redirect()->route('home');
         }
        $userToDelete = User::find($id);
        $status = $userToDelete->delete();
        if($status){
            return redirect()->back()->with("success","User was deleted sussessifully !!!");
        }
    }
   

}
