<?php

namespace Frota\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Frota\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;

class EventController extends Controller
{
    public function loadEvents(){
        
        $events = Event::all();
        return response()->json($events);
    }

    public function update(Request $request, $id){
        
        $dados = $request->all();
        $events = Event::find($dados['id']);

        if( $events->update($dados)){
            return response()->json($events);
        }
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),Event::$rules);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $input = $request->all();

        Event::create($input);
        return response()->json(['success'=>'As informações foram salvas com sucesso']);
        
    }

    public function deletar($id){

        $evento = Event::where('id',$id)->delete();
        return response()->json($evento);
    }
}
