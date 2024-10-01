<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'reporter_id',
        'reported_id',
        'reason',
        'description',
    ];

    /**
     * Get the reporter that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    /**
     * Get the reported that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function reported()
    {
        return $this->belongsTo(User::class, 'reported_id');
    }

    /**
     * Get all of the owning reportable models.
     */
    public function reportable()
    {
        return $this->morphTo();
    }
}
