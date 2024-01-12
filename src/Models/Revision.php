<?php

namespace Ewwe\FilamentRevisionsPlugin\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'data',
        'user_id',
        'type',
    ];

    protected $casts = [
        'data' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
