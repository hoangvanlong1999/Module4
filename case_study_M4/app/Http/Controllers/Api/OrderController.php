<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function checkout(Request $request)
    {
        // dd($request->all());
        $cart = $request->cart;
        $address = $request->address;
        $email = $request->email;
        $name = $request->name;
        $phone = $request->phone;

        $order = new Order();
        $order->customer_id = $request->id; // Sử dụng giá trị customer_id được truyền vào qua request.
        $order->total_amount = 1;
        $order->order_date = date("Y-m-d");
        $order->save();

        if (count($cart)>0) {
            foreach ($cart as $key => $cartItem) {
                $OrderDetail = new OrderDetail();
                $OrderDetail->order_id = $order->id;
                $OrderDetail->product_id = (int)$cartItem['id'];
                $OrderDetail->quantity = $cartItem['quantity'];
                $OrderDetail->total = $cartItem['quantity'] * $cartItem['price'];
                $OrderDetail->save();
            }
        }

        return response()->json([
            'message' => 'Order successfully registered',
            'order' => $order
        ], 201);
    }
}