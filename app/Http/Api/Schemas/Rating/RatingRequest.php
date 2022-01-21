<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Create new checkout",
 *     description="Request for create a new checkout for a cart",
 * )
 */
class RatingRequest
{
    /**
     * @OA\Property(
     *     title="product_id",
     *     description="product_id  for storing",
     *     example="1",
     * )
     *
     * @var string
     */
    public $product_id;

    /**
     * @OA\Property(
     *     title="rating ",
     *     description="rating for storing",
     *     example="123",
     * )
     *
     * @var string
     */
    public $rating;

    /**
     * @OA\Property(
     *     title="description",
     *     description="description for storing",
     *     example="description",
     * )
     *
     * @var string
     */
    public $description;
      /**
     * @OA\Property(
     *     title="email ",
     *     description="email  for storing",
     *     example="user@gmail.com",
     * )
     *
     * @var string
     */
    public $email ;

}