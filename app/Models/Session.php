<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    // Usamos los nombres de las columnas que vienen en tu migración
    protected $fillable = [
        'id', 
        'user_id', 
        'ip_address', 
        'user_agent', 
        'payload', 
        'last_activity'
    ];

    // IMPORTANTE: Laravel usa strings para el ID de esta tabla, no números
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false; // Esta tabla no usa created_at/updated_at
}