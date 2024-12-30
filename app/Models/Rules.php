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
        return $this->belongsTo(Kerusakan::class);
    }

    public function getGejalaIdsAttribute($value)
    {
        return json_decode($value, true);
    }
}
