<?php

namespace App\Models;

use App\Models\Rules;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{

    protected $table = 'Kerusakans';
    protected $guarded = ['id'];

    public function rules()
    {
        return $this->hasMany(Rules::class, 'kerusakan_id');
    }

}
