<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Incidencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'ubicacion',
        'user_id',
        'estado',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
