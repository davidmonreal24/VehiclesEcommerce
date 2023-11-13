<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    static $rules = [
        'id_user' => 'required',
        'id_vehicle' => 'required',
        'estado' => 'required'
    ];
    protected $fillable = [
        'id_user',
        'id_vehicle',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    
}
