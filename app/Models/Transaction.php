<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    use HasFactory;
    protected $connection = 'mysql_connect_4';
    protected $table = "transaction";
    protected $primaryKey = 'id_transaction';
    public $timestamps = false;
    protected $fillable = [
      "numero_pedido","email","monto","id_usuario","fecha_pedido"
    ];

    public function Client(){
        return $this->belongsTo(Client::class, "id_usuario");
    }    

}
