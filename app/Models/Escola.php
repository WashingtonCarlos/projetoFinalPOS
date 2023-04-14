<?php

namespace Frota\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome_da_escola','diretor','ViceDiretor','email','endereco','telefone'];

    static $roles = [

        'nome_da_escola' => 'required|min:4',
        'diretor' => 'required|min:3',
        'ViceDiretor' => 'required|min:3',
        'email' => 'required|email',
        'endereco' => 'required',
        'telefone' => 'required'
    ];

    public function evento(){
        $this->hasMany(Event::class,'escola_id','id');
    }

    public function search($search = null){

        $results = $this->where(function($query) use($search){

            if($search){
                $query->where('nome_da_escola','LIKE',"%{$search}%");
            }

        })
        ->paginate();
        
        return $results;
    }

}
