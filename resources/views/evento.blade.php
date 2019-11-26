@extends('layouts.app')

@section('banner-style')
background-image: url(../storage/{{$evento->banner_path}})
@endsection

@section('title-content')
<h1>{{$evento->nome}}</h1>
<p>
    Começa {{$evento->inicio}}
</p>
<p>
    Termina {{$evento->fim}}
</p>
@endsection

@section('content')
<style>
    .evento-page{
        background-color: white;
        padding-left: 20px;
        padding-right: 20px;
    }

    .info-group{
        padding: 20px 0;
    }

    .info-group label {
        font-size: 22px;
    }

    .info-group p {
        font-size: 20px;
        font-style: italic;
    }

    .card-ingresso {
        min-width: 330px;
        min-height: 100px;
        background-color:white;
        position: fixed;
        bottom: 0;
        right: 0;
        margin: 20px;
        border: solid 1px #bfbfbf;
    }

    .card-ingresso .card-header{
        background-color: #ce0518;
        padding: 10px;
        color:white;
        font-size: 16px;
        font-weight: bolder;
    }

    .card-ingresso .card-body{
        border-top: solid 1px #bfbfbf;
        border-bottom: solid 1px #bfbfbf;
    }

    .card-ingresso .ingresso {
        display: flex;
        justify-content: space-between;
        padding: 10px 5px;
    }

    .card-ingresso .ingresso input {
        width: 70px;
    }

    .card-ingresso .card-footter {

    }

    .flex{ display: flex;}
    .flex-space-between {
        justify-content: space-between;
    }
</style>
<section class="evento-page section">
    <div class="flex flex-space-between">
        <h2>Informações do Evento</h2>
        <div>
            Presenças Confirmadas {{count($evento->presencas())}}
            @guest
            @else
                @if(Auth::user()->confirmouPresenca($evento->id))
                <form action="{{url('home/cancelarPresenca')}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="presenca" value="{{Auth::user()->presenca($evento->id)->id}}">
                    <button type="submit" class="btn">Presença Confirmada</button>
                </form>
                @else
                <form action="{{url('home/confirmarPresenca')}}" method="post">
                    @csrf
                    <input type="hidden" name="evento" value="{{$evento->id}}">
                    <button type="submit" class="btn btn-primary">Confirmar Presença</button>
                </form>
                @endif
            @endguest
        </div>
    </div>
    <div class="info-group">
        <label for="">Descrição</label>
        <p>
            {{$evento->descricao}}
        </p>
    </div>
    <div class="info-group">
        <label for="">Endereço</label>
        <p>
            {{$evento->rua}}, nº {{$evento->numero}}, {{$evento->complemento != null ? $evento->completo.',' : ''}}
            Bairro {{$evento->bairro}}, CEP {{$evento->cep}}, {{$evento->cidade}} - {{$evento->uf}}
        </p>
    </div>
    <div class="info-group">
        <label for="">Organizador</label>
        <p>
            {{$evento->user()->name}}
        </p>
    </div>
</section>
<div class="card-ingresso">
    <div class="card-header">
        Ingressos
    </div>
    <div class="card-body">
        <div class="ingresso">
            <div>
                Inteira R$20,00
            </div>
            <div>
                <input type="number" name="inteira">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success btn-block">Comprar</button>
    </div>
</div>
@endsection
