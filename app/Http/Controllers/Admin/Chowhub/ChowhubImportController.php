<?php

namespace App\Http\Controllers\Admin\Chowhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ChowhubProduct;
use App\Models\ChowhubProductVariation;
use App\Models\ChowhubProductGallery;
use App\Models\ChowhubVariationAttribute;
use App\Models\ChowhubVariationAttributeValue;
use App\Models\Category;
use App\Models\ChowhubTag;
use App\Models\ChowhubBrand;
use App\Models\ChowhubProductBrand;
use Illuminate\Support\Facades\Validator;
use App\Models\ChowhubBackendTag;
use App\Models\ChowhubProductBackendTag;
use App\Models\ChowhubProductTag;
use App\Models\ChowhubProductDescriptionImage;
use App\Models\ChowhubProductFeaturePageImage;
use App\Models\ChowhubStore;
use DataTables;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Chowhub\Product\AddProduct;
use App\Http\Requests\Admin\Chowhub\Product\UpdateProduct;
use Storage;
use Intervention\Image\Facades\Image;
use App\Imports\ChowhubProductsImport;
use App\Exports\ChowhubProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ChowhubImportController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.chowhub.products.import');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return Excel::download(new ChowhubProductsExport, 'users-collection.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
    {
  

     
       
       $data  = $request->all();
       $validator = Validator::make($request->all(),[
           'product_csv' =>'required|mimes:csv,txt'
         ],[
         
           'product_csv.required' => 'Upload the csv file is mandatory',
           'product_csv.mimes'    => 'Please upload the csv file only',
         ]
       );
        if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
       } else {
        $CsvFile =    Excel::toArray(new ChowhubProductsImport(),$request->file('product_csv'));
       
        if(!empty($CsvFile)){
         
          $csvData=[];


          foreach($CsvFile as $key => $value)
          {
            foreach ($value as $key => $csv) {
              if($key != 0){
                array_push($csvData,$csv);
              }   
            }
            $header=$value[0]; 
          }
          foreach ($csvData as $key => $value) {
          
            $variation=[];
            $attribute='';
            $media_image='';
            $description_images='';
            $feature_page_images='';
            $product='';
            $description='';
            $sku='';
            $pet_type='';
            $age='';
            $food_type='';
            $protein_type='';
            $type='';
            $store_id='';
            $feature_image='';
            $real_price='';
            $sale_price='';
            $weight='';
            $quantity='';
            $status='';
            $backend_tag='';
            $tag='';
            $brand='';
  
        
                foreach($header as $key => $val){
                    ($val=='variation')? (array_push($variation,$value[$key] )): ''  ;
                    ($val=='attributes')? ($attribute .= $value[$key] ): ''  ;
                    ($val=='description_images')? ($description_images .= $value[$key] ): ''  ;
                    ($val=='feature_page_images')? ($feature_page_images.=$value[$key] ): ''  ;
                    ($val=='media_image')? ($media_image .=$value[$key] ): ''  ;
                    ($val=='product')? ($product.=$value[$key] ): ''  ;
                    ($val=='description')? ($description.=$value[$key] ): ''  ;
                    ($val=='sku')? ($sku.=$value[$key] ): ''  ;
                    ($val=='pet_type')? ($pet_type.=$value[$key] ): ''  ;
                    ($val=='age')? ($age.=$value[$key] ): ''  ;
                    ($val=='food_type')? ($food_type.=$value[$key] ): ''  ;
                    ($val=='protein_type')? ($protein_type.=$value[$key] ): ''  ;
                    ($val=='type')? ($type.=$value[$key] ): ''  ;
                    ($val=='store_id')? ($store_id.=$value[$key] ): ''  ;
                    ($val=='feature_image')? ($feature_image.=$value[$key] ): ''  ;
                    ($val=='real_price')? ($real_price.=$value[$key] ): ''  ;
                    ($val=='sale_price')? ($sale_price.=$value[$key] ): ''  ;
                    ($val=='weight')? ($weight.=$value[$key] ): ''  ;
                    ($val=='quantity')? ($quantity.=$value[$key] ): ''  ;
                    ($val=='status')? ($status.=$value[$key] ): ''  ;
                    ($val=='backend_tag')? ($backend_tag.=$value[$key] ): ''  ;
                    ($val=='tag')? ($tag.=$value[$key] ): ''  ;
                    ($val=='brand')? ($brand.=$value[$key] ): ''  ;


                }

        
                $media_image=explode(',',$media_image);
                $description_images=explode(',',$description_images);
                $feature_page_images=explode(',',$feature_page_images);
                $backend_tag=explode(',',$backend_tag);
                $tag=explode(',',$tag);
                $brand=explode(',',$brand);
                if($product){
                        $products = ChowhubProduct::create([
                          'productName' =>   $product,
                          'description' =>  $description,
                          'sku' =>  $sku,
                          'pet_type' =>  $pet_type,
                          'age' =>  json_encode(explode(',',$age)),
                          'food_type' =>  $food_type,
                          'protein_type' =>  json_encode(explode(',',$protein_type)),
                          'type' =>  $type,
                          'store_id' =>  $store_id,
                          'feature_image' =>  $feature_image,
                          'real_price' =>  $real_price,
                          'sale_price' =>  $sale_price,
                          'weight' =>  json_encode(explode(',',$weight)),
                          'quantity' =>  $quantity,
                          'status' =>  $status,
                      ]);  
                      if(!empty($description_images)){
                        $counter=0;
                        foreach ($description_images as $key => $value) {
                
                            ChowhubProductDescriptionImage::create([
                                'product_id' =>  $products->id,
                                'image_path' =>  $value,
                                'priority' =>  $counter,
                            ]);
                            $counter++;
                        }
                    }
                
                    if(!empty($feature_page_images)){
                          $counter=0;
                          foreach ($feature_page_images as $key => $value) {
                            ChowhubProductFeaturePageImage::create([
                                'product_id' =>  $products->id,
                                'image_path' =>  $value,
                                'priority' =>    $counter,
                            ]);
                            $counter++;
                        }
                    }
                    if(!empty($media_image)){
                      $counter=0;
                      foreach ($media_image as $key => $value) {
                          ChowhubProductGallery::create([
                              'product_id' =>  $products->id,
                              'image_path' =>  $value,
                              'priority' =>  $counter,
                  
                              ]);
                              $counter++;
                          }
                      }
                      if (!empty($tag))
                      { 
                          foreach ($tag as $tagName)
                          {
                          
                              $tags = ChowhubTag::updateOrCreate([
                                          'name' => trim(strtolower($tagName))
                                              ], [
                                          'name' => trim(strtolower($tagName))
                              ]);
          
                              $tagValue = new ChowhubProductTag;
                              $tagValue->tag_id = $tags->id;
                              $tagValue->product_id = $products->id;
                              $tagValue->save();
                          }
                      }
                      if (!empty($backend_tag))
                      {
                          foreach ($backend_tag as $vakey => $tagName)
                          {
          
                              $tag = ChowhubBackendTag::updateOrCreate([
                                          'name' => trim(strtolower($tagName))
                                              ], [
                                          'name' => trim(strtolower($tagName))
                              ]);
          
                              $tagValue = new ChowhubProductBackendTag;
                              $tagValue->tag_id = $tag->id;
                              $tagValue->product_id = $products->id;
                              $tagValue->save();
                          }
                      }
                      if (!empty($brand))
                      {
                          foreach ($brand as $vakey => $tagName)
                          {
          
                              $tag = ChowhubBrand::updateOrCreate([
                                          'name' => trim(strtolower($tagName))
                                              ], [
                                          'name' => trim(strtolower($tagName))
                              ]);
          
                              $tagValue = new ChowhubProductBrand;
                              $tagValue->brand_id = $tag->id;
                              $tagValue->product_id = $products->id;
                              $tagValue->save();
                          }
                      }
                    
                      if (!empty($attribute))
                      {
                        
                          $attribute=explode(';',$attribute);
                          $attributesName = [];
                          $attr=[];
                          foreach ($attribute as $vakey => $attributeName)
                          {
                            $attributeName=   explode('=',$attributeName);
                          
                              $variationAttribute = ChowhubVariationAttribute::updateOrCreate([
                                          'name' => $attributeName[0]
                                              ], [
                                          'name' => $attributeName[0]
                              ]);
                                  
                              if ($variationAttribute->id)
                              {
                                array_push($attr,$variationAttribute->id);
                                  $variationAttrArrs = explode(",", $attributeName[1]);
                                  
                                  foreach ($variationAttrArrs as $variationAttrArr)
                                  {
                                      $variationAttributeValue = new ChowhubVariationAttributeValue;
                                      $variationAttributeValue->attribute_id = $variationAttribute->id;
                                      $variationAttributeValue->product_id = $products->id;
                                      $variationAttributeValue->name = $variationAttrArr;
                                      $variationAttributeValue->save();
                                  }
                              }
                          }
                          
                          if (!empty($variation))
                          {
                          
        
                              foreach ($variation as $variations)
                              {
                                $variationQty='';
                                $variationWeight='';
                                $variationRealPrice='';
                                $variationSalePrice='';
                                $variationSku='';
                                $variationImage='';
                                $variationdynamic=[];
                                $variationdynamicValue=[];
                                $variations  =explode(',',$variations);
                              
                                  foreach ($variations as $key => $value) {
                                    $value=explode('=',$value);
                                  
                                    ($value[0]=='qty')? ($variationQty .= $value[1] ): ''  ;
                                    ($value[0]=='weight')? ($variationWeight .= $value[1] ): ''  ;
                                    ($value[0]=='real_price')? ($variationRealPrice .= $value[1] ): ''  ;
                                    ($value[0]=='sale_price')? ($variationSalePrice .= $value[1] ): ''  ;
                                    ($value[0]=='sku')? ($variationSku .= $value[1] ): ''  ;
                                    ($value[0]=='image')? ($variationImage .= $value[1] ): ''  ;
                                    array_push($variationdynamic,$value);
                                    array_push($variationdynamicValue,$value[1]);
        
                                  }
                    
                            
                                  $productVariation = new ChowhubProductVariation;
                                  $productVariation->product_id = $products->id;
                                
                                  $variationAttributeIds = [];
                                  foreach ($variationdynamic as $key => $attribute)
                                  {
                                      if($attribute)
                                      {
                                      $attr=ChowhubVariationAttribute::where('name',$attribute[0])->first();
                                    
                                      if($attr){
                                        $selectedAttrubutes = ChowhubVariationAttributeValue::select('id', 'attribute_id')->where(['product_id' => $products->id, 'name' =>$attribute[1],'attribute_id' =>$attr->id])->first();
                            
                                        if ($selectedAttrubutes)
                                        {
                                            $AttributesArray = [];
                                            $AttributesArray['attribute_id'] = $selectedAttrubutes->id;
                                            $AttributesArray['attribute_name_id'] = $selectedAttrubutes->attribute_id;
                                            array_push($variationAttributeIds, $AttributesArray);
                                        }
                                      }
                                    
                                  }
                                  }
                              
                                  $productVariation->real_price = $variationRealPrice;
                                  $productVariation->sale_price = $variationSalePrice;
          
                                  $productVariation->quantity = $variationQty;
                                  $productVariation->weight = $variationWeight;
                                  $productVariation->variation_attributes_name_id = json_encode($variationAttributeIds);
                                  $productVariation->sku = $variationSku;
          
                                  $productVariation->image = $variationImage;
                                  $productVariation->save();
                              }
                }
               
                  }
              }else{
                return redirect()->back()->with('error', 'Csv file in not matched!');
              }








            } 
          }
        }
        return redirect()->back()->with('success', 'Product Imported successfully!');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       
    }

  
}
