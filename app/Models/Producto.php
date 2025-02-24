<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Indica que el modelo usa la tabla 'productos'

    protected $fillable = [
        'nombre',
        'precio_costo',
        'precio_venta',
        'porcentaje_ganancia',
        'stock',
    ];
}
