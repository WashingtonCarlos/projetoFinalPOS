<?php

namespace Frota\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['marcaModelo','tipoVeiculo','especie','categoria','capacidade','placa'];
    public $table = "veiculos";

    static $rules = [
        
        'marcaModelo' => 'required|min:6',
        'tipoVeiculo' => 'required',
        'especie' => 'required',
        'capacidade' => 'required',
        'placa' => 'required',

    ];

    public function motorista(){
        $this->hasOne(Motorista::class,'motorista_id','id');
    }
}
