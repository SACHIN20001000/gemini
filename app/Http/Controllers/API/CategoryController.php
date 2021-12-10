<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Admin\CategoryResource;
use App\Http\Requests\API\CategoriesRequest;
class CategoryController extends Controller
{
   /**
     * @OA\Get(
     *      path="/categories",
     *      operationId="Categories",
     *      tags={"Products"},
     *      security={
     *          {"Bearer": {}},
     *          },
     *     summary="Categories",
     *     @OA\Response(
     *         response="200",
     *         description="Categories",
     *         @OA\JsonContent(ref="#/components/schemas/CategoriesResponse")
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

    public function index()
    {
        $categories = Category::with('childrens')->where(['parent'=>0,'type'=>'Product'])->get();
        
        return  CategoryResource::collection($categories);
    }
     /**
     * @OA\Get(
     *      path="/categories/{id}",
     *      operationId="Categories By Id",
     * summary="Categories_by_id",
     *      tags={"Products"},
     *      security={
     *          {"Bearer": {}},
     *          },
       *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="1",
     *         required=true,
     *      ),
     *     summary="Categories By Id",
     *     @OA\Response(
     *         response="200",
     *         description="Categories",
     *         @OA\JsonContent(ref="#/components/schemas/CategoriesResponse")
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
    public function category_by_id($id)
    {
        
        $categories = Category::with('childrens')->find($id);
      if($categories){
        return  new CategoryResource($categories);
      }else{
        return response()->json(['success' => false , 'message' => "Invailed Id"]);
      }
        
    }
}
