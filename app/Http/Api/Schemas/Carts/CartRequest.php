<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Create new Cart",
 *     description="Request for create a new cart",
 * )
 */
class CartRequest
{
    /**
     * @OA\Property(
     *     title="key",
     *     description="key  for storring",
     *     example="random",
     * )
     *
     * @var string
     */
    public $key;

    /**
     * @OA\Property(
     *     title="Product Id",
     *     description="Product Id for storring",
     *     example="example@gmail.com",
     * )
     *
     * @var string
     */
    public $product_id;

    /**
     * @OA\Property(
     *     title="Quantity",
     *     description="Quantity for storring",
     *     example="12345678",
     * )
     *
     * @var string
     */
    public $quantity;
}
