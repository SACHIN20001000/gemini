<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Admin\CategoryResource;
class CategoryController extends Controller
{
   /**
     * @OA\Get(
     *      path="/category",
     *      operationId="index",
     *      tags={"Category"},
     *      security={
     *          {"Bearer": {}},
     *          },
     *     summary="Category",
     *     @OA\Response(
     *         response="200",
     *         description="Category",
     *         @OA\JsonContent(ref="#/components/schemas/CategoryResponse")
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
        $categories = Category::all();
        return  CategoryResource::collection($categories);
    }
 
}
