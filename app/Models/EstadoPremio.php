<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPremio extends Model
{
    use HasFactory;

    protected $table = "state_races";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'codigo','state_race','state'
    ];
    public function Carrera()
    {
        return $this->hasMany(Carrera::class);
    }
}