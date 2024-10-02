<?php

namespace App\Traits;

use App\Exceptions\PolymorphicValidationException;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait LikeableModelTrait
{
    /**
     * Get all of the likes for the model.
     * @return Illuminate\Database\Eloquent\Relations\MorphMany<Like>
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     *  Add a like to the model.
     * @param Like $like
     * */
    public function addLike(Like $like)
    {
        if ($like->exists) {
            throw new PolymorphicValidationException("The like for assing with LikeableModelTrait must not be in database");
        }
        $this->likes()->save($like);
    }

    /**
     * Remove a like from the model.
     * @param Like $like
     */
    public function removeLike(Like $like)
    {
        $this->likes()->detach($like->id);
    }
}
