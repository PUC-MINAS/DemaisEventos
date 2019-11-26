<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presenca;
use Illuminate\Support\Facades\Auth;

class PresencaController extends Controller
{
    public function index(){
        $presencas = Presenca::where('user_id', Auth::user()->id)->get();

        return view('admin.presencas.index')->with('presencas', $presencas);
    }
}
