<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete(); // Delete user
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.'); // Redirect with success message
    }
}
