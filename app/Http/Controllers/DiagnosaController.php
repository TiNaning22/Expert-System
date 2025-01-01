<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kerusakan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class DiagnosaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('user.diagnosa', compact('gejala'));
    }

    public function hasil(Request $request)
    {
        $request->validate([
            'gejala_ids' => 'required|array',
        ]);

        $gejalaDipilih = $request->gejala_ids;

        $rule = Rule::whereJsonContains('gejala_ids', $gejalaDipilih)->get();

        $hasilDiagnosa = [];
        foreach ($rule as $rule) {
            $kerusakanId = $rule->kerusakan_id;

            //hitung CF
            $cf = $rule->mb - $rule->md;

            //CF Combine
            $cfCombine = $cf * $rule->cf;

            //ambil kerusakan yang memiliki CF terbesar
            $kerusakan = Kerusakan::find($kerusakanId);

            $hasilDiagnosa[] = [
                'kerusakan' => $kerusakan,
                'cf' => $cfCombine,
            ];
        }

        //urutkan hasil diagnosa berdasarkan CF
        usort($hasilDiagnosa, function ($a, $b) {
            return $b['cf'] <=> $a['cf'];
        });

        return view('user.hasil-diagnosa', compact('hasilDiagnosa'));
    }
}
