<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'pemohon') {
            return view ('dashboard.dashboard');
        }
        else {
            return view ('dashboard.dashboard-pegawai');
        }
    }
}
