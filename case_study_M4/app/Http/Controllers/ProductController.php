<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ValidateProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',Product::class);
        $products = Product::paginate(5);
        return view('admin.Products.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Product::class);
        $categories = Category::all();
        return view('admin.Products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateProduct $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public\uploads\product';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->category_id = $request->category_id;
        
        alert()->success('Thêm mới thành công!');
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);
        $this->authorize('view',$products);
    
        return view('admin.Products.show', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        $this->authorize('update',$products);

        $categories = Category::all();
        return view('admin.Products.edit', compact(['categories','products']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateProduct $request, string $id)
    {
        $products = Product::find($id);
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->quantity = $request->quantity;
        $products->status = $request->status;
        $get_image = $request->image;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public\uploads\product';
        
            // Xoá tệp tin ảnh cũ
            if ($products->image && file_exists(public_path($path . '/' . $products->image))) {
                unlink(public_path($path . '/' . $products->image));
            }
        
            // Tạo tên mới cho tệp tin ảnh
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        
            // Lưu trữ tệp tin ảnh mới
            $get_image->move($path, $new_image);
            $products->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $products->category_id = $request->category_id;

        alert()->success('Cập Nhật thành công!');
        $products->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::findOrFail($id);
        $this->authorize('delete',$products);

        $products->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('products.index');
        }
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(2);
        return view('admin.Products.index', compact('products'));
    }
}
