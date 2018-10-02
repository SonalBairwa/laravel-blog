<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Content;

class UserController extends Controller
{
    public function index()
    {
    	 return view('user.home');
    }
    public function editProfile()
    {
        $user=Auth::user();
    	return view('user.editProfile',compact('user'));
    }
    public function saveEditProfile(Request $request)
    {
        //return $request->all();
    	$user_id=Auth::user()->id;
    	//$user=User::find($user_id);
    	
    	
    	$name=$request->name;
    	$email=$request->email;
    	$mobile=$request->mobile;
    	$dob=$request->date_of_birth;
    	$password=$request->password;
    	$confirm_password=$request->confirm_password;
    	if ( !empty($password) AND $password===$confirm_password) {
            $password=bcrypt($password);
    	$data=User::where('id',$user_id)->update(['date_of_birth'=>$dob,'password'=>$password,'email'=>$email,
            'mobile'=>$mobile,'name'=>$name]);
        return 1;
    	return redirect()->back();
    	}else{
    		$data=User::where('id',$user_id)->update(['date_of_birth'=>$dob,'email'=>$email,
            'mobile'=>$mobile,'name'=>$name]);
            return 2;
        return redirect()->back();
    	}
    }
    public function allPosts()
    {
        $all_posts=Content::all();
        $users=User::all();
        $posts = array();
        foreach ($users as $user) {
           $arr=Content::where('user_id',$user->id)->get();
           array_push($posts,$arr); 
        }
        //return $posts;
        return view('allPosts',compact('all_posts','users','posts'));
    }
}
