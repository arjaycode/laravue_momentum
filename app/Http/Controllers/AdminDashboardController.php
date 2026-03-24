<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function index(){
    $usersQuery = User::query()->latest();

    $total_users = $usersQuery->count();
    $total_inactive = $usersQuery->clone()->where('status', 'inactive')->count();
    $total_banned = $usersQuery->clone()->where('status', 'banned')->count();

    $recent_users = User::query()
        ->where('role', 'user')
        ->latest()
        ->take(10)
        ->get();

    return Inertia::render('admin/Dashboard', [
        'total_users' => $total_users,
        'total_inactive' => $total_inactive,
        'total_banned' => $total_banned,
        'recent_users' => $recent_users,
    ]);
    }
}
