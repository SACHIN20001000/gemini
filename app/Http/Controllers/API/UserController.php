<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Users\UserResource;
use App\Models\User;
use App\Http\Requests\API\ChangePasswordRequest;
use App\Http\Requests\API\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{


    /**
     * @OA\Get(
     *      path="/profile",
     *      operationId="index",
     *      tags={"Users"},
     *      security={
     *          {"Bearer": {}},
     *          },
     *     summary="User Profile",
     *     @OA\Response(
     *         response="200",
     *         description="User Profile",
     *         @OA\JsonContent(ref="#/components/schemas/ProfileResponse")
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

    public function userProfile()
    {
        $user = auth()->user();

        return new UserResource($user);
    }
 
     /**
     * @OA\Put(
     *      path="/update",
     *      operationId="update",
     * summary="Update Existing  user",
     *      tags={"Users"},
     *      security={
     *          {"Bearer": {}},
     *          },
     * @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateProfileRequest")
     *     ),
     *     summary="UpdateProfile",
     *     @OA\Response(
     *         response="200",
     *         description="UpdateProfile",
     *         @OA\JsonContent(ref="#/components/schemas/UpdateProfileResponse")
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

    public function updateProfile(UpdateProfileRequest $request)
    {
     
        auth()->user()->update(['name' => $request->name]);
        $user = auth()->user();
        return new UserResource($user);
    }



}
