<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $users = $query->latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required|in:user,admin']);

        // Không thể tự đổi role của chính mình
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Không thể thay đổi role của chính mình!');
        }

        $user->update(['role' => $request->role]);
        $label = $request->role === 'admin' ? 'Quản trị viên' : 'Người dùng';

        return back()->with('success', "Đã cập nhật role của {$user->name} thành {$label}.");
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Không thể xoá tài khoản của chính mình!');
        }
        $name = $user->name;
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', "Đã xoá tài khoản của {$name}.");
    }
}
