<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ValidateCategory;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->authorize('viewAny',Category::class);
        $categories = Category::paginate(10);
        return view('admin.Categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Category::class);
        return view('admin.Categories.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateCategory $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        

        alert()->success('Thêm mới thành công!');
        $categories->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);
        $this->authorize('view', $categories );
    
        return view('admin.Categories.show', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categories = Category::find($id);
        $this->authorize('update', $categories);
        return view('admin.Categories.edit',compact(['categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateCategory $request, string $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        

        alert()->success('Cập Nhật thành công!');
        $categories->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $categories = Category::findOrFail($id);
        $this->authorize('delete', $categories);
        $categories->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');
        return redirect()->route('categories.index');
    }
}
