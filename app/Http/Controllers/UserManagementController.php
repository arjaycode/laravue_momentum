<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class userManagementController extends Controller
{
    public function index() {
        $users = User::all();
        return Inertia::render('admin/userManagement/Index', ['users' => $users]);
    }
}
