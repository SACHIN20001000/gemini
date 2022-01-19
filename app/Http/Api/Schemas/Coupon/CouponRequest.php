<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Coupon Request response",
 *     description="Coupon Request response",
 * )
 */
class CouponRequest
{

  /**
     * @OA\Property(
     *     title="name",
     *     description="name for storring",
     *     example="test",
     * )
     *
     * @var string
     */
    public $name;

}
