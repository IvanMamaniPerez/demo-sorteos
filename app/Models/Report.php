<?php

namespace App\Models;

use App\Enums\ReportReasonEnum;
use App\Enums\ReportStatusEnum;
use App\Traits\CommentableModelTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Report extends Model
{
    use HasFactory, HasUuids, CommentableModelTrait;

    protected $fillable = [
        'reporter_id',
        'reported_id',
        'reason',
        'status',
        'reportable_type',
        'reportable_id',
    ];

    protected $casts = [
        'status' => ReportStatusEnum::class,
        'reason' => ReportReasonEnum::class,
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

    /**
     * The files that belong to the Report
     * @return MorphToMany<File>
     */
    public function files(): MorphToMany
    {
        return $this->morphToMany(File::class, 'fileable');
    }
}
