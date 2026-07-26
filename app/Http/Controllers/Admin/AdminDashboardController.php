<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users'    => User::count(),
            'total_admins'   => User::where('role', 'admin')->count(),
            'total_courses'  => Course::count(),
            'published'      => Course::where('status', 'published')->count(),
            'draft'          => Course::where('status', 'draft')->count(),
            'new_users_week' => User::where('created_at', '>=', now()->subWeek())->count(),
        ];

        $recentUsers   = User::latest()->take(5)->get();
        $recentCourses = Course::with('creator')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentCourses'));
    }
}
