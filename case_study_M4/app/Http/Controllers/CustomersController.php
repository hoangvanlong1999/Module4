<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\validateCustomer;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',Customer::class);

        $customers = Customer::paginate(3);
        return view('admin.Customers.index',compact(['customers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $this->authorize('create',Customer::class);
        return view('admin.Customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validateCustomer $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->password = $request->password;
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
        
        alert()->success('Thêm mới thành công!');
        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customers = Customer::find($id);
        $this->authorize('view', $customers );

    
        return view('admin.Customers.show', ['customers' => $customers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::find($id);
        $this->authorize('update', $customers);
        return view('admin.Customers.edit',compact(['customers']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validateCustomer $request, string $id)
    {
        $customers = Customer::find($id);
        $customers->name = $request->name;
        $customers->phone = $request->phone;
        $customers->address = $request->address;
        $customers->email = $request->email;
        $customers->password = $request->password;
        $get_image = $request->image;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public\uploads\customer';
        
            // Xoá tệp tin ảnh cũ
            if ($customers->image && file_exists(public_path($path . '/' . $customers->image))) {
                unlink(public_path($path . '/' . $customers->image));
            }
        
            // Tạo tên mới cho tệp tin ảnh
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        
            // Lưu trữ tệp tin ảnh mới
            $get_image->move($path, $new_image);
            $customers->image = $new_image;
            $data['customer_image'] = $new_image;
        }

        alert()->success('Cập Nhật thành công!');
        $customers->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $customers = Customer::findOrFail($id);
        $this->authorize('delete', $customers);

        $customers->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');
        return redirect()->route('customers.index');
    }
}
