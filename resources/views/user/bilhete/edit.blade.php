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
       

        
        <h2>Editar bilhete - {{$ticket->name}} - {{$event->name}}</h2>
        <a href="{{URL::to('/bilhete/'.$event->id.'/evento')}}" title="Genaral"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{ route('tickets.update', $ticket->id)}}" enctype="multipart/form-data">
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
                    <label for="lis_category">Nome do Bilhete</label>
                    <input type="text" id="name" placeholder="Nome do evento" name="name" value="{{$ticket->name}}">
                   
                </div>
                <div class="field-group field-select">
                    <label for="lis_category">Preço do Bilhete</label>
                    <input type="number" id="price" placeholder="Preço do Bilhete" name="price" value="{{$ticket->price}}">
                   
                </div>
                
                <div class="field-group">
                    <h4 class="label">Descrição do bilhete</h4>
                    <textarea type="text" id="description" class="form-control" placeholder="Descrição do Bilhete" name="description" rows="5">{{$ticket->description}}</textarea>
                </div>
             
            </div>
           
            <div class="listing-box" id="horario">
                <h3>Horário Válido para o bilhete</h3>

                <div class="field-inline">
                    <div class="field-group field-select">
                        <label for="price_range">Data de inicio</label>
                        <input type="date" id="start_date" placeholder="Data inicio da venda" name="start_date" value="{{$ticket->start_date}}">
                    </div>
                    <div class="field-group field-select">
                        <label for="price_range">Hora de inicio</label>
                        <input type="time" id="start_time" placeholder="Horas inicio da venda " name="start_time" value="{{$ticket->start_time}}">
                    </div>
                </div>

                <div class="field-inline">
                    <div class="field-group field-select">
                        <label for="price_range">Data de termino</label>
                        <input type="date" id="end_date" placeholder="Data termino da venda" name="end_date" value="{{$ticket->end_date}}">
                    </div>
                    <div class="field-group field-select">
                        <label for="price_range">Hora de termino</label>
                        <input type="time" id="end_time" placeholder="Horas termino da venda" name="end_time" value="{{$ticket->end_time}}">
                    </div>
                </div>
                
            </div>


            <div class="listing-box" id="quantidade">
                <h3>Quantidade máxima de venda do bilhete</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Quantidade máxima de venda do bilhete</label>
                    <input type="number" id="max_qtd" placeholder="Quantidade máxima do bilhete" name="max_qtd" value="{{$ticket->max_qtd}}">
                    <input type="hidden" id="event_id" value="{{$event->id}}" name="event_id">
                    <input type="hidden" id="is_package" value="0" name="is_package">
                   
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