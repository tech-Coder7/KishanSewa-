<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $table = 'schemes';

    protected $fillable = [
        'title',
        'description',
        'link',
        'badge',
        'icon',
        'status',
    ];
}
