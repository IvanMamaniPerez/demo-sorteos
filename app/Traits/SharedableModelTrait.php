<?php

namespace App\Traits;

use App\Exceptions\PolymorphicValidationException;
use App\Models\Shared;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait SharedableModelTrait
{

    public function shareds(): MorphMany
    {
        return $this->morphMany(Shared::class, 'sharedable');
    }

    public function addShared(Shared $shared)
    {
        if ($shared->exists) {
            throw new PolymorphicValidationException("The shared for assing with SharedableModelTrait must not be in database");
        }
        $this->shareds()->save($shared);
    }

    public function removeShared(Shared $shared)
    {
        $this->shareds()->detach($shared->id);
    }
}
