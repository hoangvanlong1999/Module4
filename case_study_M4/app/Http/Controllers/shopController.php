<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('shop.home', compact('products'));
    }

    public function show($id){
        $product = Product::find($id);
        return view('shop.show', ['products' => $product]);
    }

    public function login()
    {
        return view('shop.login');
    }
    public function checklogin(Request $request)
    {
        // dd(1);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            alert()->success('Đăng nhập trang shop thành công!');
            return redirect()->route('shop.home');
        } else {
            alert()->error('Tài khoản hoặc mật khẩu không đúng,
           Vui lòng đăng nhập lại!');
            return redirect()->route('shop.login');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('shop.home');
    }

    public function register()
    {
        return view('shop.register');
    }
    public function checkregister(Request $request)
    {
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public\uploads\customer';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $customer->image = $new_image;
            $data['customer_image'] = $new_image;
        }
        if ($request->password == $request->confirmpassword) {
            alert()->success('Đăng ký tài khoản thành công!');
            $customer->save();
            return redirect()->route('shop.home');
        } else {
            return redirect()->route('shop.home')->with($notification);
        }
    }

    public function shopsearch(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('shop.home');
        }
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(2);
        return view('shop.home', compact('products'));
    }

    public function cart()
    {
        $products = Product::get();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
 
        return view('shop.cart', $param);
    }

    public function addtocart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
                'max' => $product->quantity
            ];
        }
        session()->put('cart', $cart);
        $cartQuantity = count($cart);
        return response()->json(['cartQuantity' => $cartQuantity]);
    }


    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            alert()->success('Cập Nhật Đơn Hàng Thành Công!');
        }
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            alert()->success('Xóa mặt hàng Thành Công!');
        }
    }
    public function checkOuts()
    {
        return view('shop.checkout');
    }
    public function Order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();
            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->order_date = date('Y-m-d H:i:s');
            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            // Update the product quantity in the database
            $product = Product::find($orderItem->product_id);
            $product->quantity -= $orderItem->quantity;
            if ($product->quantity == 0) {
                $product->status = 0;
            }
            $product->save();
        }
        // Clear the cart session
        session()->forget('cart');
        alert()->success('Đặt hàng thành công!');
        return redirect()->route('shop.home');
    }

}
