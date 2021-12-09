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
    public function index(Request $request){
      
        if ($request->ajax())
        {
            $data = Post::with('users')->get();

            return Datatables::of($data)
            ->addIndexColumn()
                            ->addColumn('status', function ($row)
                            {
                                if($row->status == 1){
                                    $status =  '<span class="label text-success d-flex">
                                                        <div class="dot-label bg-success me-1"></div>active
                                                    </span>';
                                }else{
                                    $status =  '<span class="label text-danger d-flex">
                                                        <div class="dot-label bg-danger me-1"></div> inactive
                                                    </span>';
                                }
                                
                                return $status;
                            })
                            ->addColumn('action', function ($row)
                            {
                                $action = '<span class="action-buttons">
                                    <a  href="'.route("editPage", $row->id).'" class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>
                                    
                                    <a href="'.route("deletePage", $row->id).'"
                                            class="btn btn-sm btn-danger remove_us"
                                            title="Delete User"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-method="DELETE"
                                            data-confirm-title="Please Confirm"
                                            data-confirm-text="Are you sure that you want to delete this Category?"
                                            data-confirm-delete="Yes, delete it!">
                                            <i class="las la-trash"></i>
                                        </a>
                                ';
                                return $action;
                            })

                            ->rawColumns(['action','status'])
                            ->make(true)
                            ;
        }

        
        return view("admin.pages.pageList");
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
