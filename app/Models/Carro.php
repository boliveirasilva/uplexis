<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carro extends Model
{
    use HasFactory;

    public function getFormatedPriceAttribute()
    {
        return 'R$ ' . number_format($this->attributes['preco'], 2, ',', '.');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
