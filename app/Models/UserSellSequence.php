<?php

namespace App\Models;

use App\Enums\SellTypeDocumentEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSellSequence extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'series',
        'sequence',
        'type_document',
        'status'
    ];

    protected $casts = [
        'type_document' => SellTypeDocumentEnum::class,
    ];
}
