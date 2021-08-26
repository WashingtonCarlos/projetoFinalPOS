<?php

namespace Frota\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    protected $fillable = ['nome','cnh','cidade','estado','cep','telefone','endereco','categoria'];
    protected $table = 'motoristas';

    static $rules = [
        'nome' => 'required',
        'cnh' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'cep' => 'required',
        'telefone' => 'required',
        'endereco' => 'required',
        'categoria' => 'required'
    ]; 

    public function eventos(){
        return $this->hasMany(Event::class);
    }

    public function search($search2 = null){

        $results = $this->where(function($query) use($search2){

            if($search2){
                $query->where('nome','LIKE',"%{$search2}%");
            }

        })
        ->paginate();
        
        return $results;
    }
}
