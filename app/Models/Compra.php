<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compra extends Model
{
    use HasFactory;
    
    protected $table = 'compras';

    protected $fillable = [
        'proveedor_id',
        'user_id',
        'fecha',
        'total',
        'quantidade',
        'estado',
        'observaciones',
        'referencia',
        'nombre_cliente',
        'email_cliente',
        'direccion_cliente',
        'telefono_cliente',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleCompra::class);
    }
}
