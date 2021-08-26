<?php

namespace Frota\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\Paginator;

class Usuario extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    
    protected $fillable = ['cep','cidade','email','nome','endereco','cpf','nivel_de_acesso','estado','telefone','password', 'remember_token'];
    public $table = "usuarios";

    static $rules = [
        'email'=> 'required|email',
        'nome' => 'required|min:3',
        'cpf' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'cep' => 'required',
        'telefone' => 'required',
        'endereco' => 'required',
        'nivel_de_acesso' => 'required',
        'password' => 'required'
    ];

    public function eventos(){
        return $this->belongsToMany(Event::class);
    }

    public function search($search = null){

        $results = $this->where(function($query) use($search){

            if($search){
                $query->where('nome','LIKE',"%{$search}%");
            }

        })
        ->paginate();
        
        return $results;
    }
}
