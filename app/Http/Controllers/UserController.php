<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {

        if (isset($request->user_name)) {
            $users = User::where('name', 'like', '%' . $request->user_name . '%')->get();
        } else
         {
            $users = User::all();
        }

        return view('admin.users.list_users', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('admin.users.create_user');
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = uploadImage($file, "uploads/users_images");
            $input['image_path'] = $path;
        }

        $input['password'] = bcrypt($input['password']);
        $input['is_admin'] = $request->has('is_admin') ? 1 : 0;
        $user = User::create($input);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show_user', [
            'user' => $user,
        ]);
    }
}
