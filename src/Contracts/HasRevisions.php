<?php

namespace Ewwe\FilamentRevisionsPlugin\Contracts;

use Ewwe\FilamentRevisionsPlugin\Models\Revision;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

trait HasRevisions
{
    protected static function booted(): void
    {
        static::updating(function (Model $model) {
            $attributes = [];
            foreach ($model->getFillable() as $item) {
                $attributes[$item] = $model->getOriginal($item);
            }
            Revision::create([
                'model_type' => $model::class,
                'model_id' => $model->id,
                'data' => $attributes,
                'user_id' => Auth::user()->id,
            ]);
        });
    }

    public function revisions(): MorphMany
    {
        return $this->morphMany(Revision::class, 'model');
    }
}
