<?php

namespace Frota\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
<<<<<<< HEAD
=======
use Frota\Models\Escola;
>>>>>>> 0e8546bc56e4d53724e746addf26dea24183e6dd
use Frota\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;

class EventController extends Controller
{
<<<<<<< HEAD

=======
    
>>>>>>> 0e8546bc56e4d53724e746addf26dea24183e6dd
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
        
        //$dados = Escola::select('id')->where('nome_da_escola',$request->nome_da_escola)->first();
        //$request->usuario_id = $dados['id'];
        //dd($request);
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
<<<<<<< HEAD

    public function pdfCreate1(){

        $dados = Event::all();
        $pdf = PDF::loadView('pdf.aluguel', compact('dados'));
=======
    //gerar arquivos PDF
    public function pdfCreate($id){
        //GERAR PDF DE FORMA INDIVIDUAL
        $dados = DB::select('SELECT * FROM events WHERE id = ?',[$id]);
        //dd($dados[0]->escola_id);
        $dados2 = Escola::all();
        //dd($dados2);
        $pdf = PDF::loadView('pdf.aluguel', compact('dados','dados2'));
        return $pdf->stream('aluguel.pdf', array("Attachment" => true));
    }

    public function pdfCreate1(){
        //GERAR PDF DE FORMA GERAL 
        $dados = Event::all();
        //dd($dados);
        $dados2 = Escola::all();
        $pdf = PDF::loadView('pdf.aluguel', compact('dados','dados2'));
>>>>>>> 0e8546bc56e4d53724e746addf26dea24183e6dd
        return $pdf->stream('aluguel.pdf', array("Attachment" => true));
    }
}
