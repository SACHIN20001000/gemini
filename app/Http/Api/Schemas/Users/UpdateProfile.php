<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Update user profile response",
 *     description="Update user profile response",
 * )
 */
class UpdateProfile
{

/**
     * @OA\Property(
     *     title="Name",
     *     description="Name of key for updating",
     *     example="random",
     * )
     *
     * @var string
     */
    public $name;
   
}
