<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Create new checkout",
 *     description="Request for create a new checkout for a cart",
 * )
 */
class FaqRequest
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="name  for storing",
     *     example="johm",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="email ",
     *     description="email for storing",
     *     example="john",
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="question",
     *     description="question for storing",
     *     example="john@gmail.com",
     * )
     *
     * @var string
     */
    public $question;

}
