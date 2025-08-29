<?php
// app/Http/Controllers/Admin/UserManagementController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        $formattedUsers = $users->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'barangay' => $user->barangay,
            'role' => $user->role,
            'created_at' => $user->created_at->format('Y-m-d H:i:s'),
        ]);

        return Inertia::render('Admin/UserManagement/Index', [
            'users' => $formattedUsers,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'phone' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'user'; // Set default role to 'user'

        User::create($validated);

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    // Removed edit() method - not needed for modal approach

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'phone' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Keep the existing role, don't change it during update
        $user->update($validated);

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}