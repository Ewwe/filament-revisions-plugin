<?php

namespace Ewwe\FilamentRevisionsPlugin\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'data',
        'user_id',
    ];

    protected $casts = [
        'data' => 'json',
    ];
}
