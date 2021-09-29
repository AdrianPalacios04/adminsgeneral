<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;
    protected $table = "reclamaciones";
    protected $primaryKey = 'id_reclamaciones';
    public $timestamps = false;

    protected $fillable = [
      'telefono_casa','contestar','correo','domicilio','tienda_compra','id_tipo',
       'monto_reclamado','id_categoria','pedido','detalle','id_usuario','fecha_registro',
       'correlativo','id_usuario','id_medioComunica','detalle'
    ];
    public function Clients()
    {
        return $this->belongsTo(Client::class,'id_usuario');
    }
    public function Tipo()
    {
        return $this->belongsTo(TipoReclamo::class,'id_tipo');
    }
    public function Categoria()
    {
        return $this->belongsTo(TipoCategoria::class,'id_categoria');
    }
      public function Medio()
    {   
        return $this->belongsTo(MedioComunica::class,'id_medioComunica');
    }
}