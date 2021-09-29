<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Code extends Model
{
     public $timestamps = false;
    // protected $dateFormat = 'U';
    use HasFactory;
    protected $fillable = [
         'codes','f_inicio','f_final','tipo_ticket','cantidad','origen'
    ];
    
    public function Premio()
    {
        return $this->belongsTo(TipoPremio::class,'id_tipo');
    }
}