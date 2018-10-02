<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	 return view('user.home');
    }
    public function editProfile()
    {
    	return view('user.editProfile');
    }
    public function saveEditProfile(Request $request)
    {
    	$user_id=Auth::user()->id;
    	//$user=User::find($user_id);
    	
    	return $file;
    	$name=$request->name;
    	$email=$request->email;
    	$mobile=$request->mobile;
    	$dob=$request->date_of_birth;
    	$password=$request->password;
    	$confirm_password=$request->confirm_password;
    	if ($password===$confirm_password) {

    	$data=User::where('id',$user_id)->update(['date_of_birth'=>$dob,'password'=>$password,'email'=>$email,
            'mobile'=>$mobile,'name'=>$name]);
    	return response()->json(['profile updated']);
    	}else{
    		return response()->json(['password not matched']);
    	}
    }
}
