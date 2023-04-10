@extends('layouts.master')
@section('content')


<main id="main" class="site-main">
    <div class="site-content">
        <div class="landing-banner" style="background-image: url('{{asset('template/images/bg/banner-1.jpeg')}}');">
            <div class="container">
                <div class="lb-info">
                    <h2 style="color:white" ;> Produza eventos e conteúdos digitais na maior plataforma.</h2>
                    <p style="color:white" ;>Soluções completas para promotores de eventos e emprendedores digitais, desde a criação, publicação, gestão, venda e entrega.</p>

                    <div class=" lb-button ">
                        <a href="{{route('register')}}" class="btn " title="View more ">Criar eventos</a>

                    </div>
                </div>
                <!-- .lb-info -->
            </div>
        </div>
        <!-- .landing-banner -->
        <div class="img-box-inner ">
            <div class="container ">
                <div class="title ld-title ">
                    <h2>Sobre nós.</h2>
                    
                </div>
               
            </div>
        </div>
    
    </div>
    <!-- .site-content -->

</main>
<!-- .site-main -->

@endsection