<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Category Response",
 *     description="Category Response",
 * )
 */
class CategoryResponse
{
    
/**
  * @OA\Property(
  * type="object",
  * example={
  * "id": "1",
  *  "name": "admin",
  *"slug": "admin",
  *"created": "Dec 08, 2021 10:30:06",

  *  }
  * ),
  * )
 * @var array
 */
    public $data;
}
