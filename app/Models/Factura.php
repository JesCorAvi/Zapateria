<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "created_at"];

    public function lineas(): HasMany
    {
        return $this->hasMany(Linea::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
