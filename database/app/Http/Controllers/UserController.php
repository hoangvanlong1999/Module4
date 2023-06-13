<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $items = User::paginate(3);
        // dd($item);
        return view('index',compact('items'));
    }

    public function create(){
        return view('create');
    }



    public function store(Request $request)
        {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->age = $request->input('age');
            $user->city = $request->input('city');

            try {
                $user->save();

                // Thêm bản ghi thành công
            } catch (\Exception $e) {
                // Thêm bản ghi thất bại, xử lý lỗi tại đây
                return back()->withInput()->withErrors(['msg' => 'Lỗi: ' . $e->getMessage()]);
            }
            return redirect()->route('users.index');

        }
}