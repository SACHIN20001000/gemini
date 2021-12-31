<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\Products\ProductResource;
use App\Http\Requests\API\ProductRequest;
class ProductController extends Controller
{

/**
     * @OA\Get(
     *      path="/products",
     *      operationId="Products",
     *      tags={"Products"},
     *      security={
     *          {"Token": {}},
     *          },
     *     summary="Products",
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
        $products = Product::with(['category','store','productVariation','productGallery','variationAttributesValue'])->paginate($limit);
      
        return  ProductResource::collection($products);
    }
     /**
     * @OA\Get(
     *      path="/products/{id}",
     *      operationId="Product By Id",
     * summary="products_by_id",
     *      tags={"Products"},
     *      security={
     *          {"Token": {}},
     *          },
       *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="1",
     *         required=true,
     *      ),
     *     summary="Products By Id",
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
        $products = Product::with(['category','store','productVariation','productGallery','variationAttributesValue'])->find($id);
      if($products){
        return  new ProductResource($products);
      }else{
        return response()->json(['success' => false , 'message' => "Invailed Id"]);
      }
        
    }

    /**
     * @OA\Get(
     *      path="/products/category/{id}",
     *      operationId="Product By categoryId",
     * summary="product_by_categoryid",
     *      tags={"Products"},
     *      security={
     *          {"Token": {}},
     *          },
       *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="1",
     *         required=true,
     *      ),
     *     summary="Products By Category Id",
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
        $products = Product::with(['category','store','productVariation','productGallery','variationAttributesValue'])->where('category_id',$id)->paginate($limit);
      
      if($products){
        return  ProductResource::collection($products);
      }else{
        return response()->json(['success' => false , 'message' => "Invailed Id"]);
      }
        
    }
}