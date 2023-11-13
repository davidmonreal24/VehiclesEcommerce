<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    static $rules = [
        'nombre' => 'required',
        'tipo' => 'required',
        'capacidad' => 'required',
        'color' => 'required',
        'precio' => 'required',
        'estado' => 'required'
    ];
    protected $fillable = [
        'nombre',
        'tipo',
        'capacidad',
        'color',
        'modelo3d',
        'precio',
        'estado'
    ];

    public function Requests()
    {
        return $this->hasMany(Request::class, 'id_vehicle');
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('nombre', 'LIKE', "%$search%")
            ->onWhere('tipo', 'LIKE', "%$search%")
            ->onWhere('capacidad', 'LIKE', "%$search%")
            ->onWhere('color', 'LIKE', "%$search%")
            ->onWhere('modelo3d', 'LIKE', "%$search%")
            ->onWhere('precio', 'LIKE', "%$search%");
        }
    }

    public function scopeFilter($query, $filter)
    {
        if ($filter) {
            return $query->where('tipo', $filter);
        }
    }
}
