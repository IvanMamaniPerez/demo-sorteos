<?php

namespace App\Traits;

use App\Exceptions\PolymorphicValidationException;
use App\Models\View;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait ViewableModelTrait
{

    /**
     * Get all of the views for the model.
     * @return Illuminate\Database\Eloquent\Relations\MorphMany<View>
     */
    public function views(): MorphMany
    {
        return $this->morphMany(View::class, 'viewable');
    }

    /**
     *  Add a view to the model.
     * @param View $view
     * */
    public function addView(View $view)
    {
        if ($view->exists) {
            throw new PolymorphicValidationException("The view for assing with ViewableModelTrait must not be in database");
        }
        $this->views()->save($view);
    }

    /**
     * Remove a view from the model.
     * @param View $view
     */
    public function removeView(View $view)
    {
        $this->views()->detach($view->id);
    }
}
