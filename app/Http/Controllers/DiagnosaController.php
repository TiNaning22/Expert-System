<?php

namespace App\Http\Controllers;

use App\Models\Rules;
use App\Models\Gejala;
use App\Models\Kerusakan;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

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
    
        $rules = Rules::all();
    
        $hasilDiagnosa = [];
        foreach ($rules as $rules) {
            $gejalaRule = json_decode($rules->gejala_ids, true);
            $mbValues = json_decode($rules->mb, true);
            $mdValues = json_decode($rules->md, true);
        
            // Cek kecocokan gejala
            if (count(array_intersect($gejalaRule, $gejalaDipilih)) > 0) {
                $kerusakanId = $rules->kerusakan_id;
                $kerusakan = Kerusakan::find($kerusakanId);
        
                $cfCombine = 0;
                $cfOld = 0;
        
                foreach ($gejalaRule as $gejalaId) {
                    $mb = isset($mbValues[$gejalaId]) ? floatval($mbValues[$gejalaId]) : 0;
                    $md = isset($mdValues[$gejalaId]) ? floatval($mdValues[$gejalaId]) : 0;
                    $cfUserValue = isset($cfUser[$gejalaId]) ? floatval($cfUser[$gejalaId]) : 0;
        
                    Log::info("Gejala ID: $gejalaId, MB: $mb, MD: $md, CF User: $cfUserValue");
        
                    // Hitung CF
                    $cfPakar = $mb - $md;
                    $cfGejala = $cfPakar * $cfUserValue;
        
                    if ($cfOld == 0) {
                        $cfCombine = $cfGejala;
                    } else {
                        $cfCombine = $cfOld + $cfGejala * (1 - $cfOld);
                    }
        
                    $cfOld = $cfCombine;
                }
        
                $hasilDiagnosa[] = [
                    'kerusakan' => $kerusakan,
                    'cf' => $cfCombine,
                ];
                
                usort($hasilDiagnosa, function ($a, $b) {
                    return $b['cf'] <=> $a['cf'];
                });
            }
        }

        return view('user.hasil-diagnosa', compact('hasilDiagnosa'));
    }
}
