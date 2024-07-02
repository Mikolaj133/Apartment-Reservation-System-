<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAllUsers()
    {
        $users = User::all();
        return view('admin-panel.account-management', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin-panel.edit-user', compact('user'));
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'is_admin' => 'required|boolean',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }



}
