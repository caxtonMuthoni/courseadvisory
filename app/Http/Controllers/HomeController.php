<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use App\User;
use App\SMS;
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
            $username = 'cagimu'; 
            $apiKey   = '4364fea1f320e7d417614fc23bd4f8bc312268e29b1cf000c45c0cc0772036eb'; 
            $AT       = new AfricasTalking($username, $apiKey);
//Checking Account Balance
            $data = $AT->application()->fetchApplicationData();
            $newData = $data['data'];
            $UserData = get_object_vars($newData);
            $newUserData = $UserData['UserData'];
            $balanced = get_object_vars($newUserData);
            $newBalance = $balanced['balance'];
            $BAL = substr($newBalance,4);

         $smses = SMS::all();
         $cost = 0;
         foreach($smses as $sms){
           $cost = $cost + $sms->amount;
         }
        return view('admin.home',compact('cost','BAL'));
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
