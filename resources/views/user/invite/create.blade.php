@extends('layouts.master')
@section('content')

<main id="main" class="site-main listing-main">
    <div class="listing-nav">
        <div class="listing-menu nav-scroll">
            <ul>
                <li class="active"><a href="#genaral" title="Genaral"><span class="icon"><i class="la la-cog"></i></span><span>Geral</span></a></li>
                <li class="active"><a href="#horario" title="Horario"><span class="icon"><i class="la la-cog"></i></span><span>Horário</span></a></li>
            </ul>
        </div>
    </div>
    
    <!-- .listing-nav -->
    <div class="listing-content">
       

        
        <h2>Criar convite - {{$event->name}}</h2>
        <a href="{{URL::to('/convites/'.$event->id.'/evento')}}" title="Genaral"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{route('convites.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="listing-box" id="genaral">
                @if (Session::has('message'))
                    <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                        {{Session::get('message')}}
                    </div>
                @endif
                <h3>Convite</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome</label>
                    <input type="text" id="name" placeholder="Nome" name="name">
                    <input type="hidden" id="name" value="{{$event->id}}" placeholder="Nome" name="event_id">
                   
                </div>
               
                
                <div class="field-group">
                    <h4 class="label">Descrição do convite</h4>
                    <textarea type="text" id="description" class="form-control" placeholder="Descrição do Convite" name="description" rows="5"></textarea>
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