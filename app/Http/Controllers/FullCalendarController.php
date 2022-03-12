<?php

namespace Frota\Http\Controllers;

use Frota\Models\Escola;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index(){
        $escolas = Escola::all(); 
        return view('fullcalendar.master')->with('escolas',$escolas);
    }
}
