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
        'categoria' => 'required',
        'capacidade' => 'required',
        'placa' => 'required',

    ];

    public function motorista(){
        $this->hasOne(Motorista::class,'motorista_id','id');
    }

    public function search($search = null){

        $results = $this->where(function($query) use($search){

            if($search){
                $query->where('marcaModelo','LIKE',"%{$search}%");
            }

        })
        ->paginate();
        
        return $results;
    }
}
