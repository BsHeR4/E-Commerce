<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index(Request $request)
    {
        $orders = Order::where('user_id', auth()->user()->id)->with(['product', 'user'])->get();

        return response()->json(["data" => OrderResource::collection($orders)], 200);
    }

    public function store(OrderRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'status_id' => '1',
            'total_price' => $product->price,
        ]);

        return response()->json($order, 201);
    }

    public function update(OrderRequest $request)
    {
        $order = Order::findOrFail($request->order_id);
        //The customers can update their orders if the order status was pending,
        // if not they can't.
        
        if($order->status->name == 'Pending')
        {   
            //In postman the new_product_id should be send in x-www-form-urlencoded
            $product = Product::findOrFail($request->product_id);
            $order->update([
                'product_id' => $product->id,
                'total_price' => $product->price,
            ]);
            return response()->json($order,204);
        }
        return response()->json(['message' => "can't be updated the order already under proccessing or shipped"]);
    }
}
