<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:8|confirmed',
            'role'=>'required|in:admin,superadmin',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);
        return redirect()->route('admin.users.index')->with('success','User created successfully.');
    }
    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'nullable|string|min:8|confirmed',
            'role'=>'required|in:admin,superadmin',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.users.index')->with('success','User updated successfully.');
    }
    public function destroy(User $user){
      if($user->id == Auth::id()){
            return redirect()->route('admin.users.index')->withErrors('You cannot delete your own account.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted successfully.');
    }
}
