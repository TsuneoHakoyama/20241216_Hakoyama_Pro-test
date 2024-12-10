<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

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
