<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TareaLimpieza extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'prioridad',
        'admin_id',
        'personal_id',
        'estado',
    ];

    public function admin(): BelongsTo{
        return $this->belongsTo(User::class,'admin_id');
    }

    public function personal(): BelongsTo{
        return $this->belongsTo(User::class,'personal_id');
    }
}
