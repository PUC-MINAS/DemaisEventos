@extends('layouts.admin')

@section('content')
<h1>Novo Evento</h1>
<div class="card">
    <div class="card-header">
        <!-- <h2 class="card-title">Novo Evento</h2> -->
    </div>
    <form action="{{url('/admin/eventos/')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome do Evento">
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inicio-date">Início</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="date" name="inicio_date" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <input type="time" name="inicio_time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="fim-date">Fim</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="date" name="fim_date" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <input type="time" name="fim_time" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <legend>Endereço</legend>
                <div class="form-row">
                    <div class="form-group col-sm-9">
                        <label for="rua">Logadouro</label>
                        <input type="text" name="rua" class="form-control" placeholder="Rua, Av., Rodovia, etc.">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" class="form-control" placeholder="Nº">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="" class="form-control" placeholder="Casa, Apartamento, Andar, Galpão...">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="" class="form-control" placeholder="Bairro">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="cep">Cep</label>
                        <input type="text" name="cep" class="form-control" placeholder="xx.xxx-xxx">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control" placeholder="Cidade">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="uf">Estado</label>
                        <input type="text" name="uf" class="form-control" placeholder="Estado">
                    </div>
                </div>
                <div class="form-group">
                    <label for="banner">Banner</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="banner" required>
                        <label class="custom-file-label" for="banner">Formatos PNG ou JPG</label>
                    </div>
                </div>
            </section>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Criar</button>
        </div>
    </form>
</div>
@endsection