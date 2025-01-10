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
        $rules = Rules::with(['kerusakan'])->get();
        $kerusakan = Kerusakan::all();
        return view('rules.rules', compact('rules' ,'kerusakan'));
    }

    public function create()
    {
        $kerusakan = Kerusakan::all();
        $rules = Rules::all();
        $gejala = Gejala::all();
        return view('rules.rules-create', compact('kerusakan', 'gejala', 'rules'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'kerusakan_id' => 'required|exists:kerusakans,id',
            'gejala_ids' => 'required|array',
            'mb' => 'required|array',
            'md' => 'required|array',
        ]);
        
        Rules::create([
            'kerusakan_id' => $validated['kerusakan_id'],
            'gejala_ids' => json_encode($validated['gejala_ids']),
            'mb' => json_encode($validated['mb']),
            'md' => json_encode($validated['md']),
        ]);
    
        return redirect('rules')->with('success', 'Rules berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rules = Rules::with(['kerusakan', 'gejala'])->where('id', $id)->first();
        $kerusakan = Kerusakan::all();
        $gejala = Gejala::all();
        return view('rules.rules-edit', compact('rules', 'kerusakan', 'gejala'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kerusakan_id' => 'required|exists:kerusakans,id',
            'gejala_ids' => 'required|array',
            'mb' => 'required|array',
            'md' => 'required|array',
        ]);
        
        Rules::where('id', $id)->update([
            'kerusakan_id' => $validated['kerusakan_id'],
            'gejala_ids' => json_encode($validated['gejala_ids']),
            'mb' => json_encode($validated['mb']),
            'md' => json_encode($validated['md']),
        ]);
    }

    public function destroy($id)
    {
        Rules::destroy($id);
        return redirect('rules')->with('success', 'Rules berhasil dihapus');
    }

    
}
