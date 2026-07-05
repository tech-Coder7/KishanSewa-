<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandiPrice extends Model
{
    protected $table = 'mandi_prices';

    protected $fillable = [
        'crop_name',
        'price',
        'unit',
        'trend',
        'change_pct',
        'mandi_name',
        'status',
    ];
}
