<?php

namespace App\Models;

use App\Models\HasFactory;
use App\Models\Kerusakan;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    // use HasFactory;

    protected $guarded = ['id'];

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kerusakan_id');
    }

    // public function getGejalaIdsAttribute($value)
    // {
    //     $this->attributes['gejala_ids'] = json_encode($value);
    // }
}
