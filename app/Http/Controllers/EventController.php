<?php

namespace Frota\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Frota\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;

class EventController extends Controller
{

    public function loadEvents($id){
        
        $events = DB::select('SELECT * FROM events WHERE usuario_id = ?', [$id]);
        //dd($events);
        return response()->json($events);
    }

    public function update(Request $request){
        
        $dados = $request->all();
        $events = Event::find($dados['id']);
        //dd($dados);
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

    public function pdfCreate1(){

        $dados = Event::all();
        $pdf = PDF::loadView('pdf.aluguel', compact('dados'));
        return $pdf->stream('aluguel.pdf', array("Attachment" => true));
    }
}
