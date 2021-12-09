<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use DataTables;
use App\Http\Requests\Admin\Page\PagesRequest;
use Illuminate\Support\Str;
use Auth;
class PageController extends Controller
{
    public function index(){
        $data = Post::with('users')->get();
      
        return view("admin.pages.pageList",compact('data'));
    }

    //below function used for add page 
    public function addPages(){
        return view("admin..pages.addpages");
    }
    //below function store data into  database
    public function store(PagesRequest $request){
              
           $user = Post::updateOrCreate([
            'title' =>    $request->title,
            'created_by'=>Auth::User()->id,
            'status'  =>  $request->status,
            'content' =>  $request->content,
            'slug' =>     Str::slug($request->title),
            'type' =>     $request->type

          ]);
          return redirect('admin/addPages')->with('success', 'Updated');
    }
    //below function is used for change the status
    public function postChangeStatus(Request $request){
        $post = Post::find($request->user_id); 
        $post->status = $request->status; 
        $post->save(); 
         return response()->json(['success'=>'Status change successfully.']); 

    } 

    public function editPage($id) { 
           $post = Post::find($id); 
            return view("admin.pages.editPage",compact('post'));

    } 

    //below function update the data 
    public function updatePage(PagesRequest $request)  {
       $post =Post::find($request->id); 
       $post->title =  $request->title;
       $post->status =  $request->status;
       $post->content =  $request->content;
       $post->type =  $request->type;
       $post->save();
      
          return redirect('admin/page')->with('success', 'Updated');

    } 
     //  below function delete the data 
    public function deletePage($id) {
       $post =Post::find($id)->delete();
     return redirect('admin/page')->with('success', 'Deleted');

    } 
}
