<?php

namespace Frota\Http\Controllers;

use Frota\Models\Event;
use Frota\Models\Escola;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index(){
        $escolas = Escola::all();
        //$events = Event::all();
        //dd($events); 
        return view('fullcalendar.master')->with('escolas',$escolas);
    }
}
