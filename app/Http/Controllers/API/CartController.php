<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Resources\Carts\CartResource;
use App\Http\Requests\API\CartIdRequest;
use App\Http\Requests\API\CartAddProductRequest;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart, CartIdRequest $request)
    {
        if ($cart->key == $request->key) {
            return response()->json($cart, 200);

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
    public function destroy(Cart $cart, CartIdRequest $request)
    {
        if ($cart->key == $request->key) {
            $cart->delete();
            return response()->json(null, 204);

        } else {

            return response()->json([
                'message' => 'The Cart key does not match with any cart.',
            ], 400);
        }
    }

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

    public function addProducts(Cart $cart, CartAddProductRequest $request)
    {
       
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        //Check if the CarKey is Valid
        if ($cart->key == $request->key) {
            //Check if the proudct exist or return 404 not found.
            try { $Product = Product::findOrFail($product_id);} catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => 'The Product you\'re trying to add does not exist.',
                ], 404);
            }

            //check if the the same product is already in the Cart, if true update the quantity, if not create a new one.
            $cartItem = CartItem::where(['cart_id' => $cart->id, 'product_id' => $product_id])->first();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                CartItem::where(['cart_id' => $cart->id, 'product_id' => $product_id])->update(['quantity' => $quantity]);
            } else {
                CartItem::create(['cart_id' => $cart->id, 'product_id' => $product_id, 'quantity' => $quantity]);
            }

            return response()->json(['message' => 'The Cart was updated with the given product information successfully'], 200);

        } else {

            return response()->json([
                'message' => 'The CarKey you provided does not match the Cart Key for this Cart.',
            ], 400);
        }

    }
}
