<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Order Response",
 *     description="Order Response",
 * )
 */
class OrderResponse
{
    
/**
  * @OA\Property(
  * type="object",
  * example={
  *  "id": 1,
  *      "product_name": "test test",
  *      "total_price": "84.00",
  *      "user_id": null,
  *      "name": "user",
  *      "email": "test@gmail.com",
   *    "city": "chd",
  *      "state": "punjab",
  *     "zip_code": "140301",
  *      "address": "fgdfgfg",
  *      "country": "india",
  *      "created_at": "2022-01-04T04:59:18.000000Z"
  *  }
  * ),
  * )
 * @var array
 */
    public $data;
}
