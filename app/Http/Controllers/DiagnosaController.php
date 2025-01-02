<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Rules;
use Illuminate\Http\Request;

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
            'cf_user' => 'required|array',
        ]);

        $gejalaDipilih = $request->gejala_ids;
        $cfUser = $request->cf_user;

        $rules = Rules::whereJsonContains('gejala_ids', $gejalaDipilih)->get();

        $hasilDiagnosa = [];
        foreach ($rules as $rules) {
            $kerusakanId = $rules->kerusakan_id;
            $kerusakan = Kerusakan::find($kerusakanId);

            $cfCombine = 0;
            $cfOld = 0;

            foreach ($gejalaDipilih as $gejalaId) {
                if (in_array($gejalaId, json_decode($rules->gejala_ids))) {
                    $mb = $rules->mb;
                    $md = $rules->md;
                    $cfUser = $cfUser[$gejalaId];
    
                    $cfPakar = $mb - $md;
                    $cfGejala = $cfPakar * $cfUser;
    
                    if ($cfOld == 0) {
                        $cfCombine = $cfGejala;
                    } else {
                        $cfCombine = $cfOld + $cfGejala * (1 - $cfOld);
                    }
    
                    $cfOld = $cfCombine;
                }
            }
    
            $hasilDiagnosa[] = [
                'kerusakan' => $kerusakan,
                'cf' => $cfCombine,
            ];
        }
    
        // Urutkan hasil diagnosa berdasarkan CF
        usort($hasilDiagnosa, function ($a, $b) {
            return $b['cf'] <=> $a['cf'];
        });

        return view('user.hasil-diagnosa', compact('hasilDiagnosa'));
    }
}
