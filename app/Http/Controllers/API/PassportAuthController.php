<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\API\RegisterUserRequest;
use App\Http\Requests\API\LoginUserRequest;
use App\Http\Resources\Users\TokenResource;
use App\Http\Resources\Users\UserResource;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
class PassportAuthController extends AppBaseController
{

    /**
     * Registration
     */

    /**
     * @OA\Post(
     ** path="/register",
     *   tags={"Users"},
     *   summary="Register new user",
     *   operationId="register",
     *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ResgisterRequest")
     *     ),
     *    @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/ResgisterResponse")
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
     *)
     **/
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $rules = [
            'email'    => 'unique:users|required',
            'password' => 'required',
        ];
    
        $input     = $request->only('email','password');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => implode(',',$validator->messages()->all())]);
        }
       
        $roleUser = Role::where('name' , 'User')->first();
        $user = User::create([
            'name' => 'null',
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;
       
            $user->assignRole($roleUser);
            $user->token = $token;
            return response()->json([ 'message'=> 'Register Successfully','status' => true, 'data' => new TokenResource($user)]);
       
    }

    /**
     * Login
     */

     /**
     * @OA\Post(
     *     path="/login",
     *     operationId="login",
     *     tags={"Users"},
     *     summary="Login existing user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/LoginResponse")
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
    public function login(Request $request)
    {
        $rules = [
            
            'email'    => 'required',
            'password' => 'required',
        ];
    
        $input     = $request->only('email','password');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => implode(',',$validator->messages()->all())]);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            $user = auth()->user();
            $user->token = $token;
            return response()->json([ 'message'=> 'Login Successfully','status' => true, 'data' => new TokenResource($user)]);

        } else {
          $check=  User::where('email',$request->email)->first();
          if(!$check){
            return response()->json(['success' => false, 'message' => "User Doesn't Exists. Please Sign Up"]);
          }
            return response()->json(['success' => false, 'message' => 'Password is incorrect. Try Again!']);
        }
    }
}
