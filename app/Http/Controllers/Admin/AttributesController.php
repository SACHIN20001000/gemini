<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VariationAttribute;
use App\Models\VariationAttributeName;
use DataTables;
use App\Http\Requests\Admin\Attributes\AddAttributes;
use App\Http\Requests\Admin\Attributes\UpdateAttributes;
use Storage;
class AttributesController extends Controller
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
            $data = VariationAttribute::with('variationAttributeName')->get();

            return Datatables::of($data)
            ->addIndexColumn()
                    ->addColumn('action', function ($row)
                            {
                                
                                $action = '<span class="action-buttons">
                                    <a  href="'.route("attributes.edit", $row).'" class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>
                                    
                                    <a href="'.route("attributes.destroy", $row).'"
                                            class="btn btn-sm btn-danger remove_us"
                                            title="Delete User"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-method="DELETE"
                                            data-confirm-title="Please Confirm"
                                            data-confirm-text="Are you sure that you want to delete this Attributes?"
                                            data-confirm-delete="Yes, delete it!">
                                            <i class="las la-trash"></i>
                                        </a>
                                ';
                                return $action;
                            })

                            ->rawColumns(['action'])
                            ->make(true)
                            ;
        }

        return view('admin.attributes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.attributes.addEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAttributes $request)
    {  
        
       
            $variationAttribute = new VariationAttribute;
            $variationAttribute->name = $request->name;
            $variationAttribute->save();
            $variationAttributeName = new VariationAttributeName;
            $variationAttributeName->name = $request->value;
            $variationAttributeName->attribute_id = $variationAttribute->id;
            $variationAttributeName->save();
            return back()->with('success','Attributes addded successfully!');
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
    public function edit($id)
    {
        $attribute= VariationAttribute::with('variationAttributeName')->where('id',$id)->first();
      
        $attributes = VariationAttribute::where('id','!=',$id)->get();
        return view('admin.attributes.addEdit',compact('attributes','attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributes $request, $id)
    {
      
        $variationAttribute = VariationAttribute::find($id);
        $variationAttribute->name = $request->name;
        $variationAttribute->save();
        $variationAttributeName =  VariationAttributeName::where('attribute_id',$id)->first();
        $variationAttributeName->name = $request->value;
        $variationAttributeName->save();
        return back()->with('success','Attributes updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VariationAttribute::find($id)->delete();
        VariationAttributeName::where('attribute_id',$id)->delete();
        return back()->with('success','Attributes deleted successfully!');
    }

}
