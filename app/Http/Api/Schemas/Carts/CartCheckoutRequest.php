<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Create new checkout",
 *     description="Request for create a new checkout for a cart",
 * )
 */
class CartCheckoutRequest
{
    /**
     * @OA\Property(
     *     title="key",
     *     description="key  for storring",
     *     example="e2e26459499dac9e6361419963e2e42861cc42adb8d6d",
     * )
     *
     * @var string
     */
    public $key;

    /**
     * @OA\Property(
     *     title="name ",
     *     description="name for storring",
     *     example="john",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="email",
     *     description="email for storring",
     *     example="john@gmail.com",
     * )
     *
     * @var string
     */
    public $email;

      /**
     * @OA\Property(
     *     title="address",
     *     description="address  for storring",
     *     example="2",
     * )
     *
     * @var string
     */
    public $address;


       /**
     * @OA\Property(
     *     title="zip_code",
     *     description="zip_code  for storring",
     *     example="2",
     * )
     *
     * @var string
     */
    public $zip_code;
       /**
     * @OA\Property(
     *     title="city",
     *     description="city  for storring",
     *     example="2",
     * )
     *
     * @var string
     */
    public $city;
       /**
     * @OA\Property(
     *     title="state",
     *     description="state  for storring",
     *     example="2",
     * )
     *
     * @var string
     */
    public $state;
       /**
     * @OA\Property(
     *     title="country",
     *     description="country  for storring",
     *     example="2",
     * )
     *
     * @var string
     */
    public $country;
}
