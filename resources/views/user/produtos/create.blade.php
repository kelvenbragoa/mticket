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
       

        
        <h2>Criar Produto - {{$event->name}}</h2>
        <a href="{{URL::to('/produtos/'.$event->id.'/evento')}}" title="Genaral"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{route('produtos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="listing-box" id="genaral">
                @if (Session::has('message'))
                    <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                        {{Session::get('message')}}
                    </div>
                @endif
                <h3>Produtos</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome</label>
                    <input type="text" id="name" placeholder="Nome do evento" name="name">
                   
                </div>
                <div class="field-group field-select">
                    <label for="lis_category">Preço de Compra</label>
                    <input type="number" id="buy_price" placeholder="Preço" name="buy_price">
                   
                </div>

                <div class="field-group field-select">
                    <label for="lis_category">Preço de Venda</label>
                    <input type="number" id="sell_price" placeholder="Preço" name="sell_price">
                   
                </div>

                <div class="field-group field-select">
                    <label for="lis_category">Quantidade</label>
                    <input type="number" id="qtd" placeholder="Preço" name="qtd">
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