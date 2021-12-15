<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\ProductVariation;
use App\Models\VariationAttribute;
use App\Models\VariationAttributeName;

use App\Models\Category;
use DataTables;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Product\AddProduct;
use App\Http\Requests\Admin\Product\UpdateProduct;
use Storage;
class ProductController extends Controller
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
            $data = Product::with('categories')->get();
         

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
                                    <a  href="'.route("products.edit", $row).'" class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>
                                    
                                    <a href="'.route("products.destroy", $row).'"
                                            class="btn btn-sm btn-danger remove_us"
                                            title="Delete User"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-method="DELETE"
                                            data-confirm-title="Please Confirm"
                                            data-confirm-text="Are you sure that you want to delete this Product?"
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

        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = Category::all();
        $products = Product::all();
        return view('admin.products.addEdit',compact('products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProduct $request)
    {  
      
        $products= new Product();
        $products->productName = $request->productName;
        if(!empty($request->feature_image)){
            $path = Storage::disk('s3')->put('images', $request->feature_image);
            $path = Storage::disk('s3')->url($path);
            $products->feature_image = $path; 
        }
      
        $products->description = $request->description;
        $products->type = $request->type;
        $products->real_price = $request->real_price;
        $products->sale_price = $request->sale_price;
        $products->category_id = $request->category_id;
        $products->status = $request->status;
        $products->save();
        $productVariation = new ProductVariation();
        $productVariation->product_id=$products->id;
        $productVariation->real_price =$request->variation_real_price;
        $productVariation->sale_price =$request->variation_sale_price;
        if(!empty($request->image)){
            $path = Storage::disk('s3')->put('images', $request->image);
            $path = Storage::disk('s3')->url($path);
            $productVariation->image = $path; 
        }
        $productVariation->variation_name =	$request->variation_name;
        $productVariation->save();
        $productSku = new ProductSku();
        $productSku->product_id=$products->id;
        $productSku->product_variation = $productVariation->id;
        $productSku->sku =$request->sku;
        $productSku->qty =$request->qty;
        $productSku->save();
        $productVariation->sku_id= $productSku->id;
        $productVariation->save();

        foreach($request->name as $key => $name){
            if($name) {
                $variationAttribute = new VariationAttribute;
                $variationAttribute->name = $name;
                $variationAttribute->save();
                $value = $request->value[$key] ?? '';
                if($value) {
                    $variationAttributeName = new VariationAttributeName;
                    $variationAttributeName->name = $value;
                    $variationAttributeName->attribute_id = $variationAttribute->id;
                    $variationAttributeName->save();
                }
            }
            
        }

return back()->with('success','Product addded successfully!');
    
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
        $categories = Category::all();
        $product= Product::with(['productSku','productVariation'])->where('id',$id)->first();
       
        $products = Product::where('id','!=',$id)->get();
        return view('admin.products.addEdit',compact('product','products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request,$id)
    {
     
        $products= Product::find($id);
        $products->productName = $request->productName;
        if(!empty($request->feature_image)){
            $path = Storage::disk('s3')->put('images', $request->feature_image);
            $path = Storage::disk('s3')->url($path);
            $products->feature_image = $path; 
        }
      
        $products->description = $request->description;
        $products->type = $request->type;
        $products->real_price = $request->real_price;
        $products->sale_price = $request->sale_price;
        $products->category_id = $request->category_id;
        $products->status = $request->status;

        $products->save();
        $productVariation = ProductVariation::where('product_id',$id)->first();
        $productVariation->product_id=$products->id;
        $productVariation->real_price =$request->variation_real_price;
        $productVariation->sale_price =$request->variation_sale_price;
        if(!empty($request->image)){
            $path = Storage::disk('s3')->put('images', $request->image);
            $path = Storage::disk('s3')->url($path);
            $productVariation->image = $path; 
        }
        $productVariation->variation_name =	$request->variation_name;
        $productVariation->save();
        $productSku = ProductSku::where('product_id',$id)->first();
        $productSku->product_id=$products->id;
        $productSku->product_variation = $productVariation->id;
        $productSku->sku =$request->sku;
        $productSku->qty =$request->qty;
        $productSku->save();
        $productVariation->sku_id= $productSku->id;
        $productVariation->save();

        foreach($request->name as $key => $name){
            if($name) {
                $variationAttribute = new VariationAttribute;
                $variationAttribute->name = $name;
                $variationAttribute->save();
                $value = $request->value[$key] ?? '';
                if($value) {
                    $variationAttributeName = new VariationAttributeName;
                    $variationAttributeName->name = $value;
                    $variationAttributeName->attribute_id = $variationAttribute->id;
                    $variationAttributeName->save();
                }
            }
            
        }
        return back()->with('success','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        ProductSku::where('product_id',$id)->delete();
        ProductVariation::where('product_id',$id)->delete();

        return back()->with('success','Product deleted successfully!');
    }

}
