<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Container\Attributes\Storage;

class KerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kerusakan = Kerusakan::all();
        return view('kerusakan.data-kerusakan', compact('kerusakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kerusakan.create-kerusakan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('gambar')->store('kerusakan-gambar');

        $validateData = $request->validate([
            'kode_kerusakan' =>'required',
            'nama_kerusakan' =>'required',
            'deskripsi' =>'required',
            'solusi' =>'required',
            'biaya' =>'required',
            'gambar' => 'required|image|file',
        ]);

        if ($request->file('gambar')){
            $validateData['gambar'] = $request->file('gambar')->store('kerusakan-gambar');
        }

        Kerusakan::create($validateData);

        return redirect('kerusakan')->with('success', 'Gejala berhasil ditambahkan');
    }

    /**
     * Display the specified resourcea
     */
    public function show(Kerusakan $kerusakan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kerusakan $kerusakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kerusakan $kerusakan)
    {
        $kerusakan->update($request->all());
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kerusakan->gambar) {
                \Illuminate\Support\Facades\Storage::delete('public/' . $kerusakan->gambar);
            }

            // Simpan gambar baru dan perbarui path-nya
            $path = $request->file('gambar')->store('kerusakan', 'public');
            $kerusakan->gambar = $path;
        }

        // Simpan perubahan
        $kerusakan->save();
        return redirect('kerusakan')->with('success', 'kerusakan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerusakan $kerusakan)
    {

    }
}

