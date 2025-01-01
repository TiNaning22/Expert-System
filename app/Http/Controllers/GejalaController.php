<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $gejala = Gejala::all();
        return view('gejala.data-gejala', compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gejala.create-gejala');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gejala = Gejala::create($request->all());
        return redirect('gejala')->with('success', 'Gejala berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        //edit gejala
        return view('gejala.edit-gejala', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $gejala->update($request->all());
        return redirect('gejala')->with('success', 'Gejala berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        //
    }
}
