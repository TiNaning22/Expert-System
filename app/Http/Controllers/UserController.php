<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kerusakan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function diagnosa()
    {
        $gejala = Gejala::all();
        return view('user.diagnosa', compact('gejala'));
    }

    // public function hasil(Request $request)
    // {
    //     $gejala = $request->gejala;
    //     $kerusakan = diagnosa($gejala);
    //     return view('user.hasil-diagnosa', compact('kerusakan'));
    // }

    public function kerusakan()
    {
        $kerusakan = Kerusakan::all();
        return view('user.kerusakan', compact('kerusakan'));
    }
}
