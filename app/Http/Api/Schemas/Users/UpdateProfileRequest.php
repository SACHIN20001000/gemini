<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Update user profile response",
 *     description="Update user profile response",
 * )
 */
class UpdateProfileRequest
{

/**
     * @OA\Property(
     *     title="name",
     *     description="name of key for updating",
     *     example="random",
     * )
     *
     * @var string
     */
    public $name;
   
}
