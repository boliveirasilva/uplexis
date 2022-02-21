<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Carro extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'user_id'];
    // protected $fillable = [
    //     'nome_veiculo', 'link', 'ano', 'combustivel', 'portas', 'quilometragem', 'cambio', 'cor', 'image', 'preco'
    // ];

    protected $appends = ['formated_price'];


    protected static function booted()
    {
        static::creating(fn($carro) => $carro->user_id = Auth::id());
    }

    public function formatedPrice(): Attribute
    {
        return new Attribute(
            get: fn() => 'R$ ' . number_format($this->attributes['preco'], 2, ',', '.')
        );
    }

    public function preco(): Attribute
    {
        return new Attribute(
            set: fn($value) => str_replace(',', '.', str_replace('.', '', $value))
        );
    }

    public function quilometragem(): Attribute
    {
        return new Attribute(
            get: fn($value) => number_format($value, 0, ',', '.'),
            set: fn($value) => str_replace('.', '', $value)
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
