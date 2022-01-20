<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

use App\Models\User;

use App\Http\Resources\Rating\RatingResource;


use App\Http\Requests\API\RatingRequest;
class RatingController extends Controller
{
 /**
     * @OA\Get(
     *      path="/rating",
     *      operationId="rating",
     *      tags={"Rating"},
     *

     *     @OA\Response(
     *         response="200",
     *         description="Pages",
     *         @OA\JsonContent(ref="#/components/schemas/RatingResponse")
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
        $rating = Rating::with('user','product')->orderBy('id', 'asc')->get();

        return  RatingResource::collection($rating);

    }

/**
     * @OA\Post(
     *      path="/rating/create",
     *      operationId="Rating Request store",
     *      tags={"Rating"},
     *
     *     summary="RatingRequest store",
     *  *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RatingRequest")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Pages",
     *         @OA\JsonContent(ref="#/components/schemas/RatingResponse")
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
    public function create(RatingRequest $request)
    {
        $user=User::where(['email'=>$request->email])->first();


            if(!empty($user) || !empty(auth()->user())){

                $inputs['user_id']=auth()->user()->id ?? $user->id ;
                $inputs['description']=$request->description;
                $inputs['product_id']=$request->product_id;
                $inputs['rating']=$request->rating;
                Rating::create($inputs);

            }else{
               $guest['name']='user';
               $guest['email']=$request->email;
               $guest['password'] = bcrypt(12345678);
               $guest_id= User::create($guest);
               $inputs['user_id']=$guest_id->id ;
               $inputs['description']=$request->description;
               $inputs['product_id']=$request->product_id;
               $inputs['rating']=$request->rating;
               Rating::create($inputs);

            }

            return response()->json([
                'success' => true,'message' => 'Rating created successfull'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
