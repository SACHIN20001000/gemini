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
  *  }
  * ),
  * )
 * @var array
 */
    public $data;
}
