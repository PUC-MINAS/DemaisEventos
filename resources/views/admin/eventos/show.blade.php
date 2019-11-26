@extends('layouts.admin')

@section('content')
<style>
    .banner{
        width:150px;
        max-height:150px;
        display:block;
    }
</style>
<h1>Evento {{$evento->nome}}</h1>
<div class="card">
    <div class="card-header">
        <!-- <h2 class="card-title">Novo Evento</h2> -->
    </div>
    <form action="{{url('/admin/eventos/'.$evento->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="card-header">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome do Evento" value="{{$evento->nome}}">
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inicio-date">Início</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="date" name="inicio_date" class="form-control" value="{{$evento->dataInicio()}}">
                        </div>
                        <div class="col-sm-6">
                            <input type="time" name="inicio_time" class="form-control" value="{{$evento->horaInicio()}}">
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="fim-date">Fim</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="date" name="fim_date" class="form-control" value="{{$evento->dataFim()}}">
                        </div>
                        <div class="col-sm-6">
                            <input type="time" name="fim_time" class="form-control" value="{{$evento->horaFim()}}">
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <legend>Endereço</legend>
                <div class="form-row">
                    <div class="form-group col-sm-9">
                        <label for="rua">Logadouro</label>
                        <input type="text" name="rua" class="form-control" placeholder="Rua, Av., Rodovia, etc." value="{{$evento->rua}}">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" class="form-control" placeholder="Nº" value="{{$evento->numero}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="" class="form-control" placeholder="Casa, Apartamento, Andar, Galpão..." value="{{$evento->complemento}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="" class="form-control" placeholder="Bairro" value="{{$evento->bairro}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="cep">Cep</label>
                        <input type="text" name="cep" class="form-control" placeholder="xx.xxx-xxx" value="{{$evento->cep}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control" placeholder="Cidade" value="{{$evento->cidade}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="uf">Estado</label>
                        <input type="text" name="uf" class="form-control" placeholder="Estado" value="{{$evento->uf}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="banner">Banner</label>
                    <img class="banner" src="{{url('storage/'.$evento->banner_path)}}" alt="">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="banner">
                        <label class="custom-file-label" for="banner">Formatos PNG ou JPG</label>
                    </div>
                </div>
            </section>
        </div>
        <div class="card-footer">
            <a href="{{url('admin/eventos')}}" class="btn btn-info">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletarModal">Deletar</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="deletarModal" tabindex="-1" role="dialog" aria-labelledby="deletarModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Deletar Evento {{$evento->nome}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        Deseja deletar esse evento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <form action="{{url('admin/eventos/'.$evento->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection