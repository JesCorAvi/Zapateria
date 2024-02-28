<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Linea extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","factura_id","zapato_id", "cantidad"];

    public function factura(): BelongsTo
    {
        return $this->belongsTo(Factura::class);
    }

    public function zapato(): BelongsTo
    {
        return $this->belongsTo(Zapato::class);
    }
}
