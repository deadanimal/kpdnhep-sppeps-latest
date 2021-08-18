<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $role = $user->role;
        if ($role == 'pemohon') {
            return view ('dashboard.dashboard');
        }
        else {
         
            return view ('dashboard.dashboard-pegawai');
        }
    }
}
