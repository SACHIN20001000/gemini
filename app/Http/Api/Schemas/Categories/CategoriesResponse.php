<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Categories Response",
 *     description="Categories Response",
 * )
 */
class CategoriesResponse
{
    
/**
  * @OA\Property(
  * type="object",
  * example={
  * "name": "Bob",
  *  "email": "example@gmail.com",
  *  }
  * ),
  * )
 * @var array
 */
    public $data;
}
