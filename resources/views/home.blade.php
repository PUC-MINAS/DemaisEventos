@extends('layouts.app')

@section('banner-style')
<!-- background-image: url(../images/portfolio/05.jpg) -->
@endsection

@section('title-content')
<h1>Demais Eventos</h1>
<p>Vários eventos para você se divertir.</p>
@endsection

@section('content')
<style>
    .nome-evento{
        position: relative;
        top: -38px;
        display: flex;
        justify-content: space-between;
        padding: 0 10px;
        text-transform: uppercase;
        font-size: 17px;
        font-weight: 900;
        color: white;
    }
</style>
<!-- gallery section -->
<section id="gallery" class="gallery section">
  <div class="container-fluid">
    <div class="section-header">
        <h2 class="wow fadeInDown animated">Eventos</h2>
        <p class="wow fadeInDown animated">Veja nossa lista de eventos disponíveis.</p>
    </div>
    <div class="row no-gutter">
    @foreach($eventos as $evento)
        <div class="col-lg-3 col-md-6 col-sm-6 work">
            <a href="{{url('/home/'.$evento->id)}}" class="work-box"> 
                <img src="storage/{{$evento->banner_path}}" alt="">
                <div class="nome-evento">
                    <div>{{$evento->nome}}</div>
                    <div>{{$evento->inicio}}</div>
                </div>
                <div class="overlay">                    
                    <div class="overlay-caption">
                        <p>
                            {{substr($evento->descricao,0, 50)}}
                        </p>
                        <p>
                            <strong>Ver mais</strong>
                        </p>
                    </div>
                </div>
            
            </a>
        </div>
    @endforeach
    </div>
  </div>
</section>
<!-- gallery section --> 
@endsection
