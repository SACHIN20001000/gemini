<?php

namespace App\Http\Controllers\API\Chowhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChowhubProduct;
use App\Models\ChowhubVariationAttribute;
use App\Http\Resources\Products\ChowhubProductResource;
use App\Http\Resources\Products\AttributesResource;
class ChowhubProductController extends Controller
{
 /**
     * @OA\Get(
     *      path="/chowhub/products",
     *      operationId="Chowhub Products",
     *      tags={"ChowhubProducts"},
     *     summary="Chowhub Products",
     *         security={
     *          {"Token": {}},
     *          },
     *     @OA\Response(
     *         response="200",
     *         description="Products",
     *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index(Request $request)
    {
      $data = $request->get('search');
      if(!empty($data)){
        $search_product = ChowhubProduct::with(['tags.tagName'])->where('productName', 'like', "%{$data}%")
                            ->orWhere('sku', 'like', "%{$data}%")
                            ->orWhere('type', 'like', "%{$data}%")
                            ->orWhere('store_id', 'like', "%{$data}%")
                            ->orWhere('category_id', 'like', "%{$data}%")
                            ->orWhere('weight', 'like', "%{$data}%")
                            ->orWhereHas('tags.tagName', function ($query) use ($data) {
                             
                              $query->where('name', 'like', "%{$data}%");
                              $query->where('tag_id', 'like', "%{$data}%");
                            
                          })
                         
                            ->get();

                            return  ChowhubProductResource::collection($search_product);
      }
        $products = ChowhubProduct::with(['category','store','productVariation','productDescriptionImage','productGallery','variationAttributesValue','tags.tagName'])->all();
      
        return  ChowhubProductResource::collection($products);
    }
     /**
     * @OA\Get(
     *      path="/chowhub/products/{id}",
     *      operationId="Chowhub Product By Id",
     * summary="chowhub_products_by_id",
     *      tags={"ChowhubProducts"},
     *      security={
     *          {"Token": {}},
     *          },
       *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="1",
     *         required=true,
     *      ),
     *     summary="Chowhub Products By Id",
     *     @OA\Response(
     *         response="200",
     *         description="products",
     *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function productById(Request $request, $id)
    {

  
      $products = ChowhubProduct::with(['category','store','productVariation','productDescriptionImage','productGallery','variationAttributesValue'])->find($id);
      if($products){
        return  new ChowhubProductResource($products);
      }else{
        return response()->json(['success' => false , 'message' => "Invailed Id"]);
      }
        
    }

    /**
     * @OA\Get(
     *      path="/chowhub/products/category/{id}",
     *      operationId="Chowhub Product By categoryId",
     * summary="chowhub_product_by_categoryid",
     *      tags={"ChowhubProducts"},
     *      security={
     *          {"Token": {}},
     *          },
       *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="1",
     *         required=true,
     *      ),
     *     summary="Chowhub Products By Category Id",
     *     @OA\Response(
     *         response="200",
     *         description="products",
     *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function productByCategoryId(Request $request,$id)
    {
      $data = $request->get('search');
      if(!empty($data)){
        $search_product = ChowhubProduct::with(['tags.tagName'])->where('productName', 'like', "%{$data}%")
                            ->orWhere('sku', 'like', "%{$data}%")
                            ->orWhere('type', 'like', "%{$data}%")
                            ->orWhere('store_id', 'like', "%{$data}%")
                            ->orWhere('category_id', 'like', "%{$data}%")
                            ->orWhere('weight', 'like', "%{$data}%")
                            ->orWhereHas('tags.tagName', function ($query) use ($data) {
                             
                              $query->where('name', 'like', "%{$data}%");
                              $query->where('tag_id', 'like', "%{$data}%");
                            
                          })
                         
                            ->get();

                            return  ChowhubProductResource::collection($search_product);
      }
        $products = ChowhubProduct::with(['category','store','productVariation','productDescriptionImage','productGallery','variationAttributesValue'])->where('category_id',$id)->all();
      
      if($products){
        return  ChowhubProductResource::collection($products);
      }else{
        return response()->json(['success' => false , 'message' => "Invailed Id"]);
      }
        
    }


    /**
     * @OA\Get(
     *      path="/chowhub/products/attributes/{id}",
     *      operationId="Chowhub Product By categoryId",
     * summary="attributes_by_product_id",
     *      tags={"ChowhubProducts"},
     *      security={
     *          {"Token": {}},
     *          },
       *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="1",
     *         required=true,
     *      ),
     *     summary="Attributes by Chowhub Product Id",
     *     @OA\Response(
     *         response="200",
     *         description="products",
     *         @OA\JsonContent(ref="#/components/schemas/AttributesResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * 
     *
     * @return \Illuminate\Http\Response
     */


    public function getAttributeByProduct(Request $request,$id)
    {
      $attributes = ChowhubVariationAttribute::whereHas('variationAttributeName', function ($query) use ($id) {
            return $query->where('product_id', '=', $id);
        })->get();

    return  AttributesResource::collection($attributes);
    }
}