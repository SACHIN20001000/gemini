<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;
use App\Models\Rating;
use App\Models\VariationAttribute;
use App\Http\Requests\API\ProductRequest;

class HomeController extends Controller
{
    public function index()
    {
		$metaInfo= [
					'title'=>'PetParent e-commerce',
					'description'=>'Meta descrption'
				];

		return view('frontend.home', compact('metaInfo'));

    }
	public function productDeatials($slug,$id)
    {
  		if($slug){
        $products = Product::with(['brand', 'productGallery'])->find($id);
        $ratings =   Rating::where('product_id',$id)->get();

        $arrayGallery=[];
        $arraybrand=[];
        $review=[];
        $aggregateRating=[];
        $overall=[];

        if($products){
          foreach ($products->productGallery as $key => $productGallery) {
            array_push($arrayGallery,$productGallery->image_path);
          }
          $arraybrand = array (
            '@type' => 'Brand',
            'name' => $products->brand->name,
          );

          if($ratings){
            foreach ($ratings as $key => $value) {
                $overall[]=$value->rating;
            }
            foreach ($ratings as $key => $value) {
                $overall[]=$value->rating;
            }
            if(count($overall)>0){
              $totalSum=array_sum($overall);
              $totalCount=count($overall);
              $overAllRating=$totalSum/$totalCount;
              $maxRating= max($overall);
              $review= array (
                    '@type' => 'Review',
                    'reviewRating' =>
                      array (
                        '@type' => 'Rating',
                        'ratingValue' => $overAllRating,
                        'bestRating' => $maxRating,
                      ),
                    'author' =>
                      array (
                        '@type' => 'Person',
                        'name' => 'Fred Benson',
                      ),
                  );
              $aggregateRating  = array (
                  '@type' => 'AggregateRating',
                  'ratingValue' => $overAllRating,
                  'reviewCount' => $totalCount,
              );
            }
          }

    			$productSchema = array (
    							  '@context' => 'https://schema.org/',
    							  '@type' => 'Product',
    							  'name' => $products->productName,
    							  'image' =>$arrayGallery,
    							  'description' => $products->description,
    							  'sku' => $products->sku,
    							  'brand' =>$arraybrand,
    							  'review' =>$review,
    							  'aggregateRating' =>$aggregateRating,
    							  'offers' => array (
      								'@type' => 'Offer',
      								'url' => 'https://example.com/anvil',
      								'priceCurrency' => 'USD',
      								'price' => '119.99',
      								'priceValidUntil' => '2020-11-22',
      								'itemCondition' => 'https://schema.org/UsedCondition',
      								'availability' => 'https://schema.org/InStock',
    		            )
    				);
            $schemaResponse = json_encode($productSchema);
            $metaInfo= [
      					'title'=>$products->productName,
      					'description'=>$products->description,
                'schemaResponse'=>$schemaResponse
      				];
    			return view('frontend.productDeatials', compact('metaInfo'));
        }else{
          return redirect('/');
        }
  		}else{
        return redirect('/');
      }
    }
}
