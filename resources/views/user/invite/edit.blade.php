@extends('layouts.master')
@section('content')

<main id="main" class="site-main listing-main">
    <div class="listing-nav">
        <div class="listing-menu nav-scroll">
            <ul>
                <li class="active"><a href="#genaral" title="Genaral"><span class="icon"><i class="la la-cog"></i></span><span>Geral</span></a></li>
                <li class="active"><a href="#horario" title="Horario"><span class="icon"><i class="la la-cog"></i></span><span>Horário</span></a></li>
                <li class="active"><a href="#quantidade" title="Quantidade"><span class="icon"><i class="la la-cog"></i></span><span>Quantidade</span></a></li>
            </ul>
        </div>
    </div>
    
    <!-- .listing-nav -->
    <div class="listing-content">
       

        
        <h2>Editar Convite - {{$invites->name}} - {{$event->name}}</h2>
        <a href="{{URL::to('/convites/'.$event->id.'/evento')}}" title="General"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{ route('convites.update', $invites->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="listing-box" id="genaral">
                @if (Session::has('message'))
                    <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                        {{Session::get('message')}}
                    </div>
                @endif
                <h3>Convite</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome</label>
                    <input type="text" id="name" placeholder="Nome do evento" name="name" value="{{$invites->name}}">
                   
                </div>
             
                
                <div class="field-group">
                    <h4 class="label">Descrição do convite</h4>
                    <textarea type="text" id="description" class="form-control" placeholder="Descrição do Bilhete" name="description" rows="5">{{$invites->description}}</textarea>
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