<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Resources\Coupon\CouponResource;
use App\Http\Requests\API\CouponRequest;
class CouponController extends Controller
{
       /**
     * @OA\post(
     *      path="/coupon",
     *      operationId="coupon",
     *      tags={"coupon"},
     *
     *     summary="coupon",
     *     @OA\Response(
     *         response="200",
     *         description="Pages",
     *         @OA\JsonContent(ref="#/components/schemas/CouponResponse")
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

    public function index(CouponRequest $request)
    {
        $coupon = Coupon::where('code',$request->name)->get();
        return  CouponResource::collection($coupon);

    }

}
