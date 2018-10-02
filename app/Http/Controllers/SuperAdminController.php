<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\RoleUser;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
         $this->middleware('superadmin');
    }

    public function index()
    {
    	 $users=User::all();
    	 $roles=Role::all();
    	 return view('admin.superadmin',compact('users','roles'));
    }
    public function assignRole(Request $request)
    {
    	// return $request->all();
    	$user=RoleUser::where('user_id',$request->user_id)->get();
    	//return $user;
    	if($user->isNotEmpty()) {
    		
    	$role_user=RoleUser::where('user_id',$request->user_id)->update(['role_id' => $request->role_id]);
    	return redirect()->back();
    	}else{
    		$role_user=RoleUser::firstOrCreate( ['role_id' => $request->role_id, 'user_id' => $request->user_id]);
    	return redirect()->back();
    	}
    }
}
