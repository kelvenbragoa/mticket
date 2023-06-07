@extends('layouts.master')
@section('content')


<main id="main" class="site-main">
    <div class="page-title page-title--small align-left" style="background-image: url({{asset('template2/images/bg/bg-about.png')}});">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name">Sobre nós</h1>
                <p class="page-title__slogan">Surgimos com o propósito de facilitar a vida das pessoas em suas experiências com eventos.</p>
            </div>
        </div>
    </div>
    <!-- .page-title -->
    <div class="site-content">
        <div class="container">
            <div class="company-info flex-inline">
                <img src="{{asset('template2/images/rere.png')}}" alt="Our Company">
                <div class="ci-content">
                    <span>Mticket</span>
                    <h2>Como Surgimos?</h2>
                    <p>Mticket não prioriza grandes eventos para milhares de pessoas. A ideia é ser uma plataforma digital que pode atender todos os perfis de eventos moçambicanos. Desde eventos para 70.000 pessoas até uma aula de cursos com entrada
                        gratuita. Nosso objectivo é entregar a tecnologia para o máximo de pessoas em moçambique e ter a maior base de eventos do país, entregar um novo tipo de experiencia de eventos nas bilheterias.
                    </p>
                </div>
            </div>
            <!-- .company-info -->
            <div class="our-team">
                <div class="container">

                </div>
                <div class="ot-content grid grid-4">

                </div>
                <!-- .ot-content -->
            </div>
            <!-- .our-team -->

            <div class="join-team align-center">
                <div class="container">
                    <h2 class="title">Juntar-se a nós</h2>
                    <div class="jt-content">
                        <p>Clique para se Registrar<br> como organizador.</p>
                        <a href="{{route('register')}}" class="btn">Registrar</a>
                    </div>
                </div>
            </div>
            <!-- .join-team -->
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->

@endsection