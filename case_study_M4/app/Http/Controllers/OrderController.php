<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Http\Requests\ValidateOrder;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $this->authorize('viewAny',Order::class);
        $orders = Order::get();
        return view('admin.Orders.index',compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = DB::table('orders')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
        ->join('products', 'orderdetails.product_id', '=', 'products.id')
        ->select('orders.*', 'customers.name as customer_name', 'products.name as product_name', 'products.price as product_price', 'orderdetails.*')
        ->where('orders.customer_id', '=', $id)
        ->orderBy('orders.order_date', 'DESC')
        ->get();
        return view('admin.Orders.show',compact('items'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders = Order::findOrFail($id);
        $this->authorize('delete',$orders);

        $orders->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');
        return redirect()->route('orders.index');
    }
}
