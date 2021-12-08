<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
use App\Http\Requests\Admin\Category\AddCategory;
use App\Http\Requests\Admin\Category\UpdateCategory;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = Category::get();

            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row)
                            {
                                $action = '<span class="action-buttons">
                                    <a href=' . url('admin/categories/' . $row->id . '/edit') . ' class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>
                                    <form action=' . url('admin/categories/' . $row->id) . ' method="POST">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return deleteRow();"
                                        ><i class="las la-trash"></i></a>
                                    </form></span>
                                ';
                                return $action;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.categories.addEdit',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategory $request)
    {
        $slug = Str::slug($request->name);
        $inputs = $request->all();
        $imageName =$request->file('feature_image')->getClientOriginalName(); 
        $inputs['feature_image'] = $imageName;
        $inputs['slug'] = $slug;
        Category::create($inputs);
        $request->feature_image->move(public_path('images'), $imageName);
        return back()->with('success','Category addded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id','!=',$category->id)->get();
        return view('admin.categories.addEdit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $slug = Str::slug($request->name);
        $inputs = $request->all();
        if($request->hasFile('feature_image')){
            $imageName =$request->file('feature_image')->getClientOriginalName(); 
            $inputs['feature_image'] = $imageName;
            $request->feature_image->move(public_path('images'), $imageName);
        }
        $inputs['slug'] = $slug;
        $category->update($inputs);
       

        return back()->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Category deleted successfully!');
    }

}
