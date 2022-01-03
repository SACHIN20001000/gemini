<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Http\Resources\Carts\CartResource;
use App\Http\Resources\Carts\CartItemsResource;
use App\Http\Requests\API\CartIdRequest;
use App\Http\Requests\API\CartAddProductRequest;
class CartController extends Controller
{
    /**
     * @OA\Get(
     *      path="/cart",
     *      operationId="Create cart key",
     *      tags={"Carts"},
     *     summary="Create cart key",
     *     @OA\Response(
     *         response="200",
     *         description="Create cart key",
     *         @OA\JsonContent(ref="#/components/schemas/CartResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index(Request $request)
    {
        $user = auth('api')->user();
        if($user)
        {
            $cart = Cart::where('user_id',$user->id)->first();
            if($cart)
            {
                return  new CartResource($cart);
            }
            
        }
        $cart = Cart::create([
            'key' => md5(uniqid(rand(), true)).uniqid(),
            'user_id' => $user->id??0,

        ]);
        

        return  new CartResource($cart);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /**
     * @OA\Get(
     *      path="/cart/{id}",
     *      operationId="show cart items",
     *      tags={"Carts"},
     *     summary="show cart items",
     *        *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="3",
     *         required=true,
     *      ),
     *      *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CartKeyRequest")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="show cart items",
     *       @OA\JsonContent(ref="#/components/schemas/SingleCartResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Cart $cart, CartIdRequest $request)
    {
        if ($cart->key == $request->key) {
            $items = CartItem::where('cart_id',$cart->id)->with(['product','variationProduct'])->get();
            return  CartItemsResource::collection($items);

        } else {

            return response()->json([
                'message' => 'The Cart key does not match with any cart.',
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Delete(
     *      path="/cart/{id}",
     *      operationId="Delete cart",
     *      tags={"Carts"},
     *     summary="Delete cart",
     *        *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="3",
     *         required=true,
     *      ),
     *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CartKeyRequest")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Get cart id by key",
     *       
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy(Cart $cart, CartIdRequest $request)
    {
 
        if ($cart->key == $request->key) {
            CartItem::where('cart_id',$cart->id)->delete();
            $cart->delete();
            return response()->json([
                'message' => 'Cart has been deleted.',
            ], 204);

        } else {

            return response()->json([
                'message' => 'The Cart key does not match with any cart.',
            ], 400);
        }
    }


     /**
     * @OA\Delete(
     *      path="cart/{cart}/{itemId}",
     *      operationId="Delete cart item",
     *      tags={"Carts"},
     *     summary="Delete cart item",
     *        *      @OA\Parameter(
     *         name="cart id",
     *         in="path",
     *         description="3",
     *         required=true,
     *      ),
     * *        *      @OA\Parameter(
     *         name="item id",
     *         in="path",
     *         description="3",
     *         required=true,
     *      ),
     *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CartKeyRequest")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Delete cart item by key",
     *       
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function deleteCartItem(Cart $cart, CartItem $itemId,CartIdRequest $request)
    {
        if ($cart->key == $request->key) {
     
            $itemId->delete();
            
            return response()->json([
                'message' => 'Cart item has been deleted.',
            ], 204);

        } else {

            return response()->json([
                'message' => 'The Cart key does not match with any cart.',
            ], 400);
        }
    }




/**
     * @OA\Get(
     *      path="/cartIdByKey",
     *      operationId="Get cart id by key",
     *      tags={"Carts"},
     *     summary="Get cart id by key",
       *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CartKeyRequest")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Get cart id by key",
     *         @OA\JsonContent(ref="#/components/schemas/CartResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function getCartIDUsingKey(CartIdRequest $request)
    {
        $cart = Cart::where('key',$request->key)->first();
            if($cart)
            {
                return  new CartResource($cart);
            }

             return response()->json([
                'message' => 'The Cart key does not match with any cart.',
            ], 400);
    }

    /**
     * @OA\Post(
     ** path="/cart/{cart}",
     *   tags={"Carts"},
     *   summary="Add Product into cart",
     *   operationId="ProductCart",
     * *        *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="3",
     *         required=true,
     *      ),
     *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CartRequest")
     *     ),
     *    @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/CartResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     *)
     **/
    /**
     * Add Product into cart api
     *
     * @return \Illuminate\Http\Response
     */

    public function addProducts(Cart $cart, CartAddProductRequest $request)
    {
       
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        
        $variation_product_id = $request->variation_product_id ?? 0;
        //Check if the CarKey is Valid
        if ($cart->key == $request->key) {
            //Check if the proudct exist or return 404 not found.
            try { $Product = Product::findOrFail($product_id);} catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => 'The Product you\'re trying to add does not exist.',
                ], 404);
            }

            //check if the the same product is already in the Cart, if true update the quantity, if not create a new one.
            $cartItem = CartItem::where(['cart_id' => $cart->id, 'product_id' => $product_id, 'variation_product_id' => $variation_product_id])->first();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                CartItem::where(['cart_id' => $cart->id, 'product_id' => $product_id,'variation_product_id' => $variation_product_id])->update(['quantity' => $quantity]);
            } else {
                CartItem::create(['cart_id' => $cart->id, 'product_id' => $product_id,'variation_product_id' => $variation_product_id, 'quantity' => $quantity]);
            }

            return response()->json(['message' => 'The Cart was updated with the given product information successfully'], 200);

        } else {

            return response()->json([
                'message' => 'The CarKey you provided does not match the Cart Key for this Cart.',
            ], 400);
        }

    }
}
