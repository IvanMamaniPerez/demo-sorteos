<?php

namespace App\Models;

use App\Enums\FileTypeEnum;
use App\Enums\PrizeStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prize extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'cost',
        'currency_code',
        'banner_id',
        'status',
    ];

    protected $casts = [
        'status' => PrizeStatusEnum::class,
    ];



    /**
     * Get the team that owns the event.
     * @return HasOne<File>
     */
    public function banner()
    {
        return $this->hasOne(File::class, 'id', 'banner_id')
            ->where('type', FileTypeEnum::IMAGE);
    }

    /**
     * Get the images associated with the event.
     * @return MorphToMany<File>
     */
    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')
            ->where('type', FileTypeEnum::IMAGE);
    }

    /**
     * Get the events that owns the prize.
     * @return BelongsToMany<Event>
     */
    public function events():BelongsToMany
    {
        return $this->belongsToMany(Event::class)->using(EventPrize::class);
    }
}
