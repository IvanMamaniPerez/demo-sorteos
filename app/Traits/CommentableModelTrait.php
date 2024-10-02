<?php

namespace App\Traits;

use App\Exceptions\PolymorphicValidationException;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait CommentableModelTrait
{
    /**
     * Get all of the comments for the model.
     * @return Illuminate\Database\Eloquent\Relations\MorphMany<Comment>
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     *  Add a like to the model, the param $comment must not be in database.
     * @param Comment $comment
     */
    public function addComment(Comment $comment)
    {
        if ($comment->exists) {
            throw new PolymorphicValidationException("The comment for assing with CommentableModelTrait must not be in database");
        }

        $this->comments()->save($comment);
    }

    /**
     * Remove a like from the model.
     * @param Comment $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments()->detach($comment->id);
    }
}
