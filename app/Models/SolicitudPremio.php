<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPremio extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = "solitud_premios";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        "id", "id_usuario", "monto", "fecha_registro", "id_banking_entity", "id_type_account", "account_soles", "interbank_number", "status"
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class, "id_usuario");
    }
    public function Banco()
    {
        return $this->belongsTo(TipoBanco::class, "id_banking_entity");
    }

    public function Cuenta()
    {
        return $this->belongsTo(TipoCuenta::class, "id_type_account");
    }
}
