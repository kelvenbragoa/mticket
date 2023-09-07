@extends('layouts.master')
@section('content')

<main id="main" class="site-main listing-main">
    <div class="listing-nav">
        <div class="listing-menu nav-scroll">
            <ul>
                <li class="active"><a href="#genaral" title="Genaral"><span class="icon"><i class="la la-cog"></i></span><span>Geral</span></a></li>
                
            </ul>
        </div>
    </div>
    
    <!-- .listing-nav -->
    <div class="listing-content">
       

        
        <h2>Editar Bar - {{$barstore->name}} - {{$event->name}}</h2>
        <a href="{{URL::to('/barstore/'.$event->id.'/evento')}}" title="General"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{ route('barstore.update', $barstore->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="listing-box" id="genaral">
                @if (Session::has('message'))
                    <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                        {{Session::get('message')}}
                    </div>
                @endif
                <h3>Bilhete</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome</label>
                    <input type="text" id="name" placeholder="Nome do evento" name="name" value="{{$barstore->name}}">
                   
                </div>
               

            </div>
           
         


           
       
            <div class="field-group field-submit">
                <input type="submit" value="Submeter" class="btn">
            </div>
        </form>
    </div>
    <!-- .listing-content -->
</main>
@endsection