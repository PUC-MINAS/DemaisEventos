<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Presenca;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('home')->with('eventos', $eventos);
    }

    public function evento($id){
        $evento = Evento::find($id);
        return view('evento')->with('evento', $evento);
    }

    public function confirmarPresenca(Request $request){
        $this->middleware('auth');
        $presenca = Presenca::where('evento_id', $request->evento)->first();
        $evento = Evento::find($request->evento);

        if(!!$presenca || !$evento){
            return back();
        }

        $presenca = new Presenca();
        $presenca->user_id = Auth::user()->id;
        $presenca->evento_id = $evento->id;

        $presenca->save();
        return back();
    }

    public function cancelarPresenca(Request $request){
        $this->middleware('auth');
        $presenca = Presenca::find($request->presenca);

        if(!$presenca){
            abort(404);
        }

        $presenca->delete();
        return back();
    }
}
