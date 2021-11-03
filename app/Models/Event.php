<?php

namespace Frota\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $table = "events";

    static $rules = [
        'title' => 'required',
        'start' => 'required',
        'end' => 'required',
        'color' => 'required',
        'description' => 'required',
        'nome_da_escola' => 'required',
        'usuario_id' => 'required',
    ];

    protected $fillable = ['title','start','end','color','description','nome_da_escola','usuario_id'];

    public function usuario(){
        return $this->hasMany(Usuario::class);
    }

    public function motorista(){
        return $this->hasMany(Motorista::class);
    }

 //   public function getStartAttribute($value){
 //       $dateStart = Carbon::createFromFormat('Y-m-d H:i:s',$value)->format('Y-m-d');
 //       $timeStart = Carbon::createFromFormat('Y-m-d H:i:s',$value)->format('H:i:s');
 //       return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
 //   }

 //   public function getEndAttribute($value){
 //       $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s',$value)->format('Y-m-d');
 //       $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s',$value)->format('H:i:s');
 //       return $this->end = ($timeEnd == '00:00:00' ? $dateEnd : $value);
 //   }
}
