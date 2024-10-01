<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
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
     * @param User $user
     * */
    public function addLike(User $user)
    {
        $this->likes()->create([
            'user_id' => $user->id
        ]);
    }

    public function removeLike(User $user)
    {
        $this->likes()->where('user_id', $user->id)->delete();
    }
}
