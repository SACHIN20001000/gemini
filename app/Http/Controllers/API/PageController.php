<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Setting;
use App\Http\Resources\Admin\PageResource;

class PageController extends Controller
{
     /**
     * @OA\Get(
     *      path="/pages",
     *      operationId="Pages",
     *      tags={"Page"},
     *    
     *     summary="Page",
     *     @OA\Response(
     *         response="200",
     *         description="Page",
     *         @OA\JsonContent(ref="#/components/schemas/PageResponse")
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
        $header = $request->header('Token');
        $setting = Setting::orderBy('id', 'asc')->first();
        $token = $setting->oauth_token ?? '';
        if($header == $token){
          $limit = $request->limit ? $request->limit : 20;
          $pages = Post::with(['users','categories'])->where('status',1)->paginate($limit);
        //   print_r($pages);die;
          return  PageResource::collection($pages);
        }else{
          return response()->json(['success' => false , 'message' => "Invalid Token"]);
        }
      
    }

}
