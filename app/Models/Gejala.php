<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{

    protected $table = 'gejalas';
    protected $guarded = ['id'];

    public function getTingkatKeyakinanAttribute()
    {
        //rumus tingkat keyakinan
        $cf = $this->mb - $this->md;

        if ($cf <= 0.1) {
            return 'Tidak Yakin';
        } elseif ($cf <= 0.2) {
            return 'Kurang Yakin';
        } elseif ($cf <= 0.4) {
            return 'Sedikit Yakin';
        } elseif ($cf <= 0.6) {
            return 'Cukup Yakin';
        } elseif ($cf <= 0.9) {
            return 'Yakin';
        } else {
            return 'Sangat Yakin';
        }
    }
}
