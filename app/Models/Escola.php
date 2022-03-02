<?php

namespace Frota\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;
    
    protected $fillable = ['nomeEscola','diretor','ViceDiretor','email','endereco','telefone'];

    static $roles = [

        'nomeEscola' => 'required|min:4',
        'diretor' => 'required|min:3',
        'ViceDiretor' => 'required|min:3',
        'email' => 'required|email',
        'endereco' => 'required',
        'telefone' => 'required'
    ];

    public function evento(){
        $this->hasMany(Event::class,'escola_id','id');
    }

}
