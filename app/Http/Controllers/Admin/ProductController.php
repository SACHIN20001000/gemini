<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\ProductVariation;
use App\Models\ProductGallery;
use App\Models\VariationAttribute;
use App\Models\VariationAttributeName;
use App\Models\VariationAttributeValue;
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
        $inputs = $request->all(); 
		
		// ADD PRODUCT TABLE DATA 
		if(!empty($inputs['productName'])){
			$products= new Product();
			$products->productName = $inputs['productName'];
			$products->description = $inputs['description'];
			$products->real_price = $inputs['real_price'];
			$products->sale_price = $inputs['sale_price'];
			$products->weight = $inputs['weight'];
			$products->quantity = $inputs['qty'];
			$products->category_id = $inputs['category_id'];
			$products->status = $inputs['status'];
			$products->save();
			//add attributes 
			//store images in gallery 
			if(!empty($inputs['image'])){
				foreach($inputs['image'] as $image){
					$productImage = new ProductGallery();
					$productImage->product_id = $products->id;
					$productImage->image_path = $image;
					$productImage->save();
				}
			}
			if(!empty($inputs['attributes'])){			
				
				$attributeCombinations=[];
				foreach($inputs['attributes'] as $vakey => $attributeName){
					$variationAttribute = new VariationAttribute;
					$variationAttribute->product_id = $products->id;
					$variationAttribute->name = $vakey;
					$variationAttribute->save();
					
					/**insert attribute**/
					if($variationAttribute->id){
						
						$variationAttrArrs = explode(",",$attributeName);
												
						foreach($variationAttrArrs as $variationAttrArr){
							$variationAttributeValue = new VariationAttributeValue;
							$variationAttributeValue->attribute_id = $variationAttribute->id;	
							$variationAttributeValue->name = $variationAttrArr;
							$variationAttributeValue->save();
							$attributeCombinations[$vakey][]=$variationAttrArr;
							/**insert variant**/						
							/*if(!empty($inputs['variations']) && $i<1){	
								foreach($inputs['variations'] as $vkey => $variation){
									if($variation[$vakey] !='' && $variation[$vakey] == $variationAttrArr){
										
									}	
								}
							}*/
						}
						
					}
				}
				$possibleCombinations = $this->array_cartesian_product($attributeCombinations);
				
				foreach($possibleCombinations as $pckay => $possibleCombination){
					$variationAttributeName = new VariationAttributeName;
					$variationAttributeName->product_id = $products->id;	
					$variationAttributeName->name = implode('-',$possibleCombination);
					$variationAttributeName->save();
					
					$productVariation = new ProductVariation;										
					$productVariation->product_id=$products->id;
					$productVariation->real_price=$inputs['variations'][$pckay]['Regular Price'];
					$productVariation->sale_price=$inputs['variations'][$pckay]['Sale Price'];
					
					$productVariation->image='';
					$productVariation->quantity='';
					$productVariation->weight='';
					$productVariation->variation_name=implode('-',$possibleCombination);
					$productVariation->variation_attributes_name_id=$variationAttributeName->id;
					$productVariation->sku=$inputs['variations'][$pckay]['Sku'];
					$productVariation->save();
				}

			}
			
			\Session::flash('success', __('Product Upload successfully.')); 
			return Response()->json([
			"success" => true,
			/*"data" => $message*/
				]);
		}     
        return Response()->json([
            "success" => false,
                    ]); 
    }
	function array_cartesian_product($arrays)
	{
		$result = array();
		$arrays = array_values($arrays);
		$sizeIn = sizeof($arrays);
		$size = $sizeIn > 0 ? 1 : 0;
		foreach ($arrays as $array)
			$size = $size * sizeof($array);
		for ($i = 0; $i < $size; $i ++)
		{
			$result[$i] = array();
			for ($j = 0; $j < $sizeIn; $j ++)
				array_push($result[$i], current($arrays[$j]));
			for ($j = ($sizeIn -1); $j >= 0; $j --)
			{
				if (next($arrays[$j]))
					break;
				elseif (isset ($arrays[$j]))
					reset($arrays[$j]);
			}
		}
		return $result;
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $categories = Category::all();
        $product= Product::with(['productSku','productVariation','productGallery'])->where('id',$id)->first();   
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
        if(!empty($request->productName)){
            $products= Product::find($id);
            $products->productName = $request->productName;
            $products->description = $request->description;
            $products->real_price = $request->real_price;
            $products->sale_price = $request->sale_price;
            $products->weight = $request->weight;
    
            $products->category_id = $request->category_id;
            $products->status = $request->status;
            $products->save();
            //add sku in sku db
            $productSku = ProductSku::where('product_id',$id)->first();
            $productSku->product_id=$products->id;
            $productSku->sku = $request->sku;
            $productSku->qty = $request->qty;
            $productSku->save();
        //add attributes 
            if(!empty($request['attributes']['name'])){
                foreach($request['attributes']['name'] as $key => $name){
                    if($name) {
                        $variationAttribute = new VariationAttribute;
                        $variationAttribute->name = $name;
                        $variationAttribute->product_id=$products->id;
                        $variationAttribute->save();
                        $value = $request['attributes']['value'][$key] ?? '';
                        if($value) {
                            $variationAttributeName = new VariationAttributeName;
                            $variationAttributeName->name = $value;
                            $variationAttributeName->attribute_id = $variationAttribute->id;
                            $variationAttributeName->product_id=$products->id;
                            $variationAttributeName->save();
                        }
                    }
                    $data[]= ['attribute_id' => @$variationAttribute->id , 'attribute_name_id'=> @$variationAttributeName->id ];
                }
            }
       
          //store images in gallery 
            if(!empty($request['image'])){
                foreach($request['image'] as $image){
                    $productImage = ProductGallery::where('product_id',$id)->first();
                    $productImage->product_id = $products->id;
                    $productImage->image = $image;
                    $productImage->save();
                }
            }
    //managing variation attributes
    if(!empty($request['variations']['Qty'])){
        foreach($request['variations']['Qty'] as $key => $variationQty){
            if($variationQty) {
                $variationRegularPrice = $request['variations']['Regular Price'][$key] ?? '';
                $variationSalePrice = $request['variations']['Sale Price'][$key] ?? '';
                $variationSku = $request['variations']['Sku'][$key] ?? '';
                $variationImage = $request['variations']['Image'][$key] ?? '';
          if(!empty($variationImage)){
                $path = Storage::disk('s3')->put('images', $variationImage);
                $path = Storage::disk('s3')->url($path);
            }
                $productVariation = ProductVariation::where('product_id',$id)->first();
                $productVariation->product_id = $products->id;
                $productVariation->real_price = $variationRegularPrice;
                $productVariation->sale_price = $variationSalePrice;
                $productVariation->image = $path;
                $productVariation->variation_ids= json_encode($data);
                $productVariation->save();
    
                $productSku = ProductSku::where('product_id',$id)->first();
                $productSku->product_id=$products->id;
                $productSku->sku = $variationSku;
                $productSku->qty = $variationQty;
                $productSku->product_variation = $productVariation->id;
                $productSku->save();
                $productVariation->sku_id = $productSku->id;
                $productVariation->save();    
           
            }
        }
    }
        \Session::flash('success', __('Product update successfully.')); 
        return Response()->json([
            "success" => true,
            "data" => $message
                ]);
     }     
           return Response()->json([
                "success" => false,
                        ]); 



       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
      $productVariation=  ProductVariation::where('product_id',$id)->first();      
 
      if(!empty($productVariation->variation_ids)){
        $data= json_decode($productVariation->variation_ids);
        foreach($data as $datas ){
            if(!empty($datas->attribute_id)){
            VariationAttribute::find($datas->attribute_id)->delete();
            VariationAttributeName::find($datas->attribute_name_id)->delete();
           }    
          }
      }
  
      Product::find($id)->delete();
      ProductSku::where('product_id',$id)->delete();
      ProductGallery::where('product_id',$id)->delete();

      ProductVariation::where('product_id',$id)->delete();
        return back()->with('success','Product deleted successfully!');
    }

    public function save_photo(Request $request){
      
 
        if ($request->file('images')) {
            $path = Storage::disk('s3')->put('images/products', $request->images);
            $path = Storage::disk('s3')->url($path);
            $id = substr($path, -8, 1);
           return Response()->json([
                "success" => true,
                "image" => $path,
                "id" => $id
            ]);
 
        }
 
        return Response()->json([
                "success" => false,
                "image" => ''
            ]);
    }


}
