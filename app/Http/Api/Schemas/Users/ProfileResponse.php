<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Profile Response",
 *     description="Profile Response",
 * )
 */
class ProfileResponse
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
