<?php

namespace App\Traits;

use App\Models\Log;
use App\Observers\LoggableObserver;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait LoggableModelTrait
{
    /**
     * Get all of the logs for the model.
     * @return Illuminate\Database\Eloquent\Relations\MorphMany<Log>
     */
    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }

    /**
     * Susbcribe the model to LoggableObserver.
     * @return void
     */
    public static function bootLoggableModelTrait()
    {
        static::observe(LoggableObserver::class);
    }
}
