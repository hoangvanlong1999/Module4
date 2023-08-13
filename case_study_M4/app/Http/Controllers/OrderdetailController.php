<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\ValidateOrderdetails;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderdetails = Orderdetail::paginate(10);
        return view('admin.Orderdetails.index',compact('orderdetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('admin.Orderdetails.create', compact(['orders','products']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateOrderdetails $request)
    {
        $orderdetails = new Orderdetail();
        $orderdetails->order_id = $request->order_id;
        $orderdetails->product_id = $request->product_id;
        $orderdetails->quantity = $request->quantity;
        $orderdetails->total = $request->total;
        

        alert()->success('Thêm mới thành công!');
        $orderdetails->save();

        return redirect()->route('orderdetails.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderdetails = Orderdetail::find($id);
        
        return view('admin.Orderdetails.show', ['orderdetails' => $orderdetails]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orderdetails = Orderdetail::find($id);
        $orders = Order::all();
        $products = Product::all();
        return view('admin.Orderdetails.edit', compact(['orders','products','orderdetails']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateOrderdetails $request, string $id)
    {
        $orderdetails = Orderdetail::find($id);
        $orderdetails->order_id  = $request->order_id ;
        $orderdetails->product_id  = $request->product_id ;
        $orderdetails->quantity = $request->quantity;
        $orderdetails->total = $request->total;
        

        alert()->success('Cập Nhật thành công!');
        $orderdetails->save();

        return redirect()->route('orderdetails.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderdetails = Orderdetail::findOrFail($id);
        $orderdetails->delete();
        alert()->success('Đã chuyễn vào thùng rác');
        return redirect()->route('orderdetails.index');
    }
}
