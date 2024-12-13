<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shop_id',
        'user_id',
        'date',
        'time',
        'number'
    ];

    public function shops(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
