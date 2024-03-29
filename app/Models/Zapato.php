<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zapato extends Model
{
    use HasFactory;

    public function carritos(): HasMany
    {
        return $this->hasMany(Carrito::class);
    }

    public function lineas(): HasMany
    {
        return $this->hasMany(Linea::class);
    }
}
