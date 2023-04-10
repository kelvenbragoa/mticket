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
       

        
        <h2>Criar lineup - {{$event->name}}</h2>
        <a href="{{URL::to('/lineup/'.$event->id.'/evento')}}" title="Genaral"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{route('lineup.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="listing-box" id="genaral">
                @if (Session::has('message'))
                    <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                        {{Session::get('message')}}
                    </div>
                @endif
                <h3>LineUp</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome</label>
                    <input type="text" id="name" placeholder="Nome" name="name">
                   
                </div>
               
                
                <div class="field-group">
                    <h4 class="label">Descrição do lineup</h4>
                    <textarea type="text" id="description" class="form-control" placeholder="Descrição do LineUp" name="description" rows="5"></textarea>
                </div>
             
            </div>
           
            <div class="listing-box" id="horario">
                <h3>Horário</h3>

                <div class="field-inline">
                    <div class="field-group field-select">
                        <label for="price_range">Data de inicio</label>
                        <input type="date" id="start_date" placeholder="Data inicio" name="start_date">
                    </div>
                    <div class="field-group field-select">
                        <label for="price_range">Hora de inicio</label>
                        <input type="time" id="start_time" placeholder="Horas inicio" name="start_time">
                    </div>
                </div>

                <div class="field-inline">
                    <div class="field-group field-select">
                        <label for="price_range">Data de termino</label>
                        <input type="date" id="end_date" placeholder="Data termino" name="end_date">
                    </div>
                    <div class="field-group field-select">
                        <label for="price_range">Hora de termino</label>
                        <input type="time" id="end_time" placeholder="Horas termino" name="end_time">
                        <input type="hidden" id="event_id" value="{{$event->id}}" name="event_id">
                    </div>
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