<?php

namespace App\Http\Controllers\Admin\Chowhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChowhubProduct;
use App\Models\ChowhubVariationAttribute;
use App\Http\Resources\Products\ProductResource;
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
      $limit = $request->limit ? $request->limit : 20;
        $products = ChowhubProduct::with(['category','store','productVariation','productGallery','variationAttributesValue'])->paginate($limit);
      
        return  ProductResource::collection($products);
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


      $products = ChowhubProduct::with(['category','store','productVariation','productGallery','variationAttributesValue'])->find($id);
      if($products){
        return  new ProductResource($products);
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
      $limit = $request->limit ? $request->limit : 20;
        $products = ChowhubProduct::with(['category','store','productVariation','productGallery','variationAttributesValue'])->where('category_id',$id)->paginate($limit);
      
      if($products){
        return  ProductResource::collection($products);
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
