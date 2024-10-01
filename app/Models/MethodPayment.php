<?php

namespace App\Models;

use App\Enums\FileTypeEnum;
use App\Enums\MethodPaymentStatusEnum;
use App\Enums\MethodPaymentTypeEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MethodPayment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'name',
        'type',
        'status',
    ];
    
    protected $casts = [
        'type'   => MethodPaymentTypeEnum::class,
        'status' => MethodPaymentStatusEnum::class,
    ];

    /**
     * Get the transactions for the method payment.
     * @return HasMany<Transaction>
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function icon()
    {
        return $this->morphOne(File::class, 'fileable')
            ->where('type', FileTypeEnum::IMAGE);
    }
}
