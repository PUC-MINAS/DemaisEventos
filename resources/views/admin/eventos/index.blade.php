@extends('layouts.admin')

@section('content')
<style>
    .banner{
        width:100%;
    }

    .eventos{
        font-size: 16px;
    }

    .linha{
        padding: 5px 10px;
    }
</style>
<h1>Eventos</h1>
<div class="card">
    <div class="card-header">
        <!-- <h2 class="card-title">Novo Evento</h2> -->
        <a class="btn btn-primary" href="{{url('admin/eventos/create')}}">Novo Evento</a>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <div class="container eventos">
                @foreach($eventos as $evento)
                <div class="row linha">
                    <div class="col-sm-2">
                        <img class="banner" src="{{url('Storage/'.$evento->banner_path)}}" alt="">
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Evento:</label> {{$evento->nome}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Inicio:</label> {{$evento->inicio}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Fim:</label> {{$evento->fim}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="row"><div class="col"><label for="">Descrição</label></div></div>
                        <div class="row"><div class="col">{{$evento->descricao}}</div></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn-group">
                            <a href="{{url('admin/eventos/'.$evento->id)}}" class="btn btn-info btn-xs">Detalhes</a>
                            <a href="" class="btn btn-danger btn-xs">Deletar</a>
                        </div>                        
                    </div>
                </div>
                @endforeach
            </div>
        </table>
    </div>
    <div class="card-footer">

    </div>
</div>
@endsection