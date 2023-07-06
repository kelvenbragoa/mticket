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
       

        
        <h2>Criar Pacote - {{$event->name}}</h2>
        <a href="{{URL::to('/pacote/'.$event->id.'/evento')}}" title="Genaral"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{route('package.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="listing-box" id="genaral">
                @if (Session::has('message'))
                    <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                        {{Session::get('message')}}
                    </div>
                @endif
                <h3>Pacote</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome do Pacote</label>
                    <input type="text" id="name" placeholder="Nome do evento" name="name">
                   
                </div>
                <div class="field-group field-select">
                    <label for="lis_category">Preço do Pacote</label>
                    <input type="number" id="price" placeholder="Preço do Pacote" name="price">
                   
                </div>
                
                <div class="field-group">
                    <h4 class="label">Descrição do Pacote</h4>
                    <textarea type="text" id="description" class="form-control" placeholder="Descrição do Pacote" name="description" rows="5"></textarea>
                    <input type="hidden" id="event_id" value="{{$event->id}}" name="event_id">
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