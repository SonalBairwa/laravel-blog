<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Category;
use App\Content;


use Auth;
use File;

class AuthorController extends Controller
{
	 public function __construct()
    {
        // $this->middleware('auth:admin');
         $this->middleware('author');
    }

    public function index()
    {
    	 return view('author.home');
    }
    public function Content()
    {
        $user_id=Auth::user()->id;
        $data=Category::all();
        $contents=Content::all();
        return view('author.content',compact('data','contents','user_id'));
    }public function addContent()
    {
    	$user_id=Auth::user()->id;
    	$data=Category::all();
    	$contents=Content::all();
    	return view('author.addContent',compact('data','contents','user_id'));
    }
    public function editContent($id)
    {

        $content=Content::find($id);
        //return $content;
        $title=$content->title;
        $abstract=$content->abstract;
        $text=$content->text;
        $data=Category::all();
        $cat=Category::find($content->category_id);

    	return view('author.editContent',compact('title','abstract','text','cat','data','content'));
    }
    public function storeContent(Request $request)
    {
    	//return $request->all();
    	//$file=$request->file;
    	$title=$request->title;
    	$abstract=$request->abstract;
    	$content_body=$request->content_body;
    	$category=$request->category;
    	$carbon = Carbon::now();
        $user_id = Auth::user()->id;
        
        
        $filename=basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
         
          if(! File::exists(public_path()."/fileUploads/".$user_id)){
                    $path=File::makeDirectory(public_path()."/fileUploads/". $user_id,0777,true);
            }

            $path=public_path('/fileUploads/'.$user_id.'/');
            $image_path=$filename;
           
            $uploadfile = $path . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
            
            // $myfile = fopen($path."/abc.txt", "w");
            // if (! File::exists($myfile) {
            	
            //     fwrite($myfile, $abstract);
            // }
            //return $myfile;
          //$content_path=$content->move(public_path('fileUploads/'.$user_id.'/content'),'con.txt');
          $data=Content::firstOrCreate(['user_id'=>$user_id,'image'=>$image_path,'title'=>$title,'abstract'=>$abstract,'text'=>$content_body,'category_id'=>$category]);
           return redirect('/content/content')->with('status', 'Profile updated!');
          //$path="http://localhost/".substr($path,14);
          //return $path; 
        
    }
    public function storeEditContent(Request $request)
    {
       // return $request->all();
        $title=$request->title;
        $content_id=$request->content_id;
        $abstract=$request->abstract;
        $content_body=$request->content_body;
        $category=$request->category;
        $carbon = Carbon::now();
        $user_id = Auth::user()->id;
        
       
            
        $data=Content::where('id',$content_id)->update(['user_id'=>$user_id,'title'=>$title,'abstract'=>$abstract,'text'=>$content_body,'category_id'=>$category]);
           return redirect('/content/content')->with('status', 'Profile updated!');
    }
          
}
