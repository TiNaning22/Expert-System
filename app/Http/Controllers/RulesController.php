<?php

namespace App\Http\Controllers;

use App\Models\Rules;
use App\Models\Gejala;
use App\Models\Kerusakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RulesController extends Controller
{
    public function index()
    {
        $rules = Rules::with(['Kerusakan'])->get();
        $kerusakan = Kerusakan::get();
        $gejala = Gejala::get();

        return view('rules.rules', compact('rules', 'gejala', 'kerusakan'));
    }

    public function create()
    {
        $kerusakan = Kerusakan::all();
        $gejala = Gejala::all();
        return view('rules.rules-create', compact('kerusakan', 'gejala'));
    }

    public function store(Request $request)
    {
        Rules::create($request->all());
        return redirect('rules.data-rules')->with('success', 'Rules berhasil ditambahkan');
    }

    
}
