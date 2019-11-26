<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::where('user_id', Auth::user()->id)->get();
        return view('admin.eventos.index')->with('eventos',$eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nome = $request->nome;
        $evento->descricao = $request->descricao;
        $evento->inicio = $request->inicio_date.' '.$request->inicio_time.':00';
        $evento->fim = $request->fim_date.' '.$request->fim_time.':00';
        $evento->rua = $request->rua;
        $evento->numero = $request->numero;
        $evento->complemento = $request->complemento;
        $evento->bairro = $request->bairro;
        $evento->cep = $request->cep;
        $evento->cidade = $request->cidade;
        $evento->uf = $request->uf;
        $evento->user_id = Auth::user()->id;

        if($request->hasFile('banner') && $request->file('banner')->isValid()){
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->banner->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->banner->storeAs('public', $nameFile);
            $evento->banner_path = $nameFile;
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

            $evento->save();
            return redirect('admin/eventos');
        }

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);

        if(!$evento){
            abort(404);
        }

        return view('admin.eventos.show')->with('evento', $evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);
        if(!$evento){
            abort(404);
        }
        $evento->nome = $request->nome;
        $evento->descricao = $request->descricao;
        $evento->inicio = $request->inicio_date.' '.$request->inicio_time;
        $evento->fim = $request->fim_date.' '.$request->fim_time;
        $evento->rua = $request->rua;
        $evento->numero = $request->numero;
        $evento->complemento = $request->complemento;
        $evento->bairro = $request->bairro;
        $evento->cep = $request->cep;
        $evento->cidade = $request->cidade;
        $evento->uf = $request->uf;
        $evento->user_id = Auth::user()->id;

        if($request->hasFile('banner') && $request->file('banner')->isValid()){
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->banner->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->banner->storeAs('public', $nameFile);
            $evento->banner_path = $nameFile;
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            
        }

        $evento->save();
        return redirect('admin/eventos');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        if(!$evento){
            abort(404);
        }
        $evento->delete();
        return redirect('admin/eventos');
    }
}
