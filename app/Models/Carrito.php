<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrito extends Model
{
    protected $fillable = ["user_id", "zapato_id", "cantidad"];
    use HasFactory;

    public function zapato(): BelongsTo
    {
        return $this->belongsTo(Zapato::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
