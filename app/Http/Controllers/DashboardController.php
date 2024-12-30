<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kerusakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $gejala = Gejala::all();
        $kerusakan = Kerusakan::all();
        return view('dashboard.dashboard', compact('gejala', 'kerusakan'));
    }
}
