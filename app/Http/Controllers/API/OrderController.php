<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Requests\API\OrderRequest;
use App\Http\Resources\OrderCollection as OrderCollection;
use App\Http\Resources\OrderResource as OrderResource;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the User orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $userOrders = Order::where('userID', auth()->id())->get();
       return new OrderCollection($userOrders);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if($order->userID == auth()->id()){
             return new OrderResource($order);
         }else{
            return response()->json([
                'message' => 'The order you\'re trying to view doesn\'t seem to be yours, hmmmm.',
            ], 403);
         }

    }



    public function checkout($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => 'required',
            'name' => 'required',
            'address' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $item= Cart::with('items')->find($id);

        if ($item->key == $request->key) {
            $name = $request->name;
            $address = $request->address;
            // $transactionID = $request->transactionID;
            $totalPrice = (float) 0.0;
            $userId=$request->userId;
            $product_id=$item->items[0]->product_id ?? null;
            $item_quantity=$item->items[0]->quantity ?? null;
            $product = Product::find($product_id);
           
                $price = $product->sale_price;
                $inStock = $product->quantity;
                if ($inStock >= $item_quantity) {
              
                     $TotalPrice = $totalPrice + ($price * $item_quantity);

                    // $product->UnitsInStock = $product->UnitsInStock - $item->quantity;
                    // $product->save();
                } else {
                    return response()->json([
                        'message' => 'The quantity you\'re ordering of ' . $product->productName .
                        ' isn\'t available in stock, only ' . $inStock . ' units are in Stock, please update your cart to proceed',
                    ], 400);
                }

            $PaymentGatewayResponse = true;
            $transactionID = md5(uniqid(rand(), true));

            if ($PaymentGatewayResponse) {
                $order = Order::create([
                    'products' => $product->productName,
                    'totalPrice' => $TotalPrice,
                    'name' => $name,
                    'address' => $address,
                    'userID' => isset($userId) ? $userId : null,
                    'transactionID' => $transactionID,
                ]);
            $itemDel=$item->items[0]->id ?? NULL;
              CartItem::where('cart_id',$itemDel)->delete();

                return response()->json([
                    'message' => 'you\'re order has been completed succefully, thanks for shopping with us!',
                    'orderID' => $order->id,
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'The CarKey you provided does not match the Cart Key for this Cart.',
            ], 400);
        }

    }

}
