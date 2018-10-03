<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\RoleUser;

class AdminController extends Controller
{

	public function __construct()
    {
        // $this->middleware('auth:admin');
         $this->middleware('admin');
    }

    public function index()
    {
    	 return view('admin.home');
    }

   public function userRole()
    {
    	 $users=User::all();
    	 $roles=Role::all();


        
        $userWithRoles= DB::table('users')
        ->join('role_users', 'users.id', '=','role_users.user_id')
        ->join('roles', 'role_users.role_id', '=','roles.id')
        ->select('users.name as name','roles.name as role')
        ->get();

          //return $userWithRoles;
    	 return view('admin.superadmin',compact('users','roles','userWithRoles'));
    }
    public function assignRoleToUser(Request $request)
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
    public function userWithRoles()
    {
        
       return 1;
        //$userRoles=
    }

}
