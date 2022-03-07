<?php

namespace App\Exports;

use App\Models\LitterHub\LitterHubProduct;
use App\Models\LitterHub\LitterHubProductVariation;
use App\Models\LitterHub\LitterHubProductGallery;
use App\Models\LitterHub\LitterHubVariationAttribute;
use App\Models\LitterHub\LitterHubVariationAttributeValue;
use App\Models\LitterHub\Category;
use App\Models\LitterHub\LitterHubTag;
use App\Models\LitterHub\LitterHubBrand;
use App\Models\LitterHub\LitterHubProductBrand;

use App\Models\LitterHub\LitterHubBackendTag;
use App\Models\LitterHub\LitterHubProductBackendTag;
use App\Models\LitterHub\LitterHubProductTag;
use App\Models\LitterHub\LitterHubProductDescriptionImage;
use App\Models\LitterHub\LitterHubProductFeaturePageImage;
use App\Models\LitterHub\LitterHubStore;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\withHeadings;
class LitterHubProductsExport implements FromCollection
// ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    function __construct($id) {
           $this->id = $id;
    }

    public function collection()
    {

        $id=$this->id;

        $product_id=explode(',',$id);
      
        $finalData=[];
        $header['productName']="product" ?? null;
        $header['description']='description' ?? null;
        $header['sku']='sku' ?? null;
        $header['scented']='scented' ?? null;
        $header['litter_material']='litter_material' ?? null;
        $header['clumping']='clumping' ?? null;
        $header['cat_count']='cat_count' ?? null;
        $header['type']='type' ?? null;
        $header['store_id']='store_id' ?? null;
        $header['feature_image']='feature_image' ?? null;
        $header['real_price']='real_price' ?? null;
        $header['sale_price']='sale_price' ?? null;
        $header['quantity']='quantity' ?? null;
        $header['status']='status' ?? null;
        $header['backend_tag']='backend_tag' ?? null;
        $header['tag']='tag'?? null;
        $header['brand']='brand' ?? null;
        $header['media']='media_image' ?? null;
        $header['description_images']='description_images' ?? null;
        $header['feature_page_images']='experimental_page_images'?? null;
        $header['attributes']='attributes'?? null;
      

        
        foreach ($product_id as $key => $id) {
    
            $product = LitterHubProduct::find($id);
            $productGallery = LitterHubProductGallery::where('product_id',$id)->get();
            $variationAttributeValue = LitterHubVariationAttributeValue::where('product_id',$id)->get();
            $LitterHubProductDescriptionImage = LitterHubProductDescriptionImage::where('product_id',$id)->get();
            $LitterHubProductFeaturePageImage = LitterHubProductFeaturePageImage::where('product_id',$id)->get();
            $productVariation = LitterHubProductVariation::where('product_id',$id)->get();
        
            if($product){
               
                $media='';
                $description_images='';
                $feature_page_images='';
                $data['productName']=$product->productName ?? null;
                $data['description']=$product->description ?? null;
                $data['sku']=$product->sku ?? null;
                $data['scented']=$product->scented ?? null;
                $data['litter_material']=str_replace(array('"','[',']','\\'),'',$product->litter_material)  ?? null;
                $data['clumping']=$product->clumping ?? null;
                $data['cat_count']=$product->cat_count ?? null;
                $data['type']=$product->type ?? null;
                $data['store_id']=$product->store_id ?? null;
                if(!empty($product->feature_image)){
                    $product->feature_image = explode('images',$product->feature_image);
                    $path='images'.$product->feature_image[1];
                }else{
                    $path= '';
                }
                $data['feature_image']=$path ?? null;
                $data['real_price']=$product->real_price ?? null;
                $data['sale_price']=$product->sale_price ?? null;
                $data['quantity']=$product->quantity ?? null;
                $data['status']=$product->status ?? null;
                $data['backend_tag']=$product->availBackendTags ?? null;
                $data['tag']=$product->availTags ?? null;
                $data['brand']=$product->availBrands ?? null;
               
              
                if($productGallery){
                    foreach ($productGallery as $key => $value) {
                        $value->image_path= explode('images',$value->image_path);
                      
                        $media .= 'images'. $value->image_path[1].','; 
                        }
                }
                if($LitterHubProductDescriptionImage){
                    foreach ($LitterHubProductDescriptionImage as $key => $value) {
                        $value->image_path= explode('images',$value->image_path);
                        $description_images .= 'images'. $value->image_path[1].','; 
                  
                        }
                } if($LitterHubProductFeaturePageImage){
                    foreach ($LitterHubProductFeaturePageImage as $key => $value) {
                        $value->image_path= explode('images',$value->image_path);
                        $feature_page_images .= 'images'. $value->image_path[1].','; 
                    
                        }
                }
                $data['media']=$media ?? null;
                $data['description_images']=$description_images ?? null;
                $data['feature_page_images']=$feature_page_images ?? null;
                if($productVariation){
                    $var=[];
                    foreach ($productVariation as $key => $value) {
                    
                        $image='';
                        $real_price=$value->real_price ?? null;
                        $sale_price=$value->sale_price ?? null;
                        if($value->image){
                           
                            $value->image= explode('images',$value->image);
                            $image .= 'images'. $value->image[1].',' ?? null; 
                        }
                  
                        $weight=$value->weight ?? null;
                        $quantity=$value->quantity ?? null;
                        $sku=$value->sku ?? null;
                        $attr='' ?? null ;
                        $variationData='qty='.$quantity.',weight='.$weight.',real_price='.$real_price.',sale_price='.$sale_price.',sku='.$sku.',image='.$image.'';
                       
                        $allvariations = json_decode($value->variation_attributes_name_id);

                            $viewData = [];
                         
                            foreach ($allvariations as $variat)
                            {

                                $attr_name = LitterHubVariationAttribute::where('id', $variat->attribute_name_id)->pluck('name')->first();
                                $attrValue = LitterHubVariationAttributeValue::where('id', $variat->attribute_id)->pluck('name')->first();
                                $viewData[$attr_name] = $attrValue ?? null;
                                
                            }
                            
                            foreach($viewData as $key => $view){
                                $attr .=''.$key.'='.$view.',';
                            }
                           
                            $attr.=$variationData;
                            
                          array_push($var,$attr);
                       
                        }
                         }
            

          
                    
              
                    $attributes = [];
                    foreach ($product->variationAttributesValue as $datas)
                    {
                        $attributes[$datas->variationAttributeName->name][] = $datas->name;
                    }

                    $at='' ?? null;
                    foreach ($attributes as $key => $attVal) {
                        $attVal=implode(',',$attVal);
                    $at.=$key.'='.$attVal.';';
                    
                    }
              
                    $data['attributes']= $at ?? null;
                    foreach ($var as $key => $value) {
                   
                        $data['variation_'. ++$key] = $value ?? null;
                        $header['variation_'.++$key]='variation'?? null;
                    }
                        
               
                    array_push($finalData,$data); 
                    while(count($data) > 0) {
                        array_pop($data);
                    }
            }
            
        }
        array_unshift($finalData,$header);
       
        return collect($finalData);
   
    }
}
