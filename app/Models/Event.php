<?php

namespace Frota\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";

    static $rules = [
        'title' => 'required',
        'start' => 'required',
        'end' => 'required',
        'color' => 'required',
        'description' => 'required',
        'usuario_id' => 'required',
    ];

    protected $fillable = ['title','start','end','color','description','usuario_id','escola_id','nome_da_escola'];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function motorista(){
        return $this->hasMany(Motorista::class);
    }

    public function escola(){
        return $this->belongsTo(Escola::class, 'escola_id','id');
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
