<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\group;
use App\Http\Requests\validateCreateUsers;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',User::class);
        $users = User::paginate(10);
        return view('admin.User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',User::class);
        $group = group::all();
        return view('admin.User.create',compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validateCreateUsers $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;

        alert()->success('Thêm mới thành công!');
        $users->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
    
        return view('admin.User.show', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        $group = group::all();
        $this->authorize('update',$users);
        
        return view('admin.User.edit',compact(['users','group']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validateCreateUsers $request, string $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->group_id = $request->group_id;

        alert()->success('Cập Nhật thành công!');
        $users->save();

        return redirect()->route('users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $this->authorize('delete',$users);
        
        $users->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');
        return redirect()->route('users.index');
    }


    

}
