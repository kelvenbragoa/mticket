@extends('layouts.master')
@section('content')

<main id="main " class="site-main ">
    <div class="page-title page-title--small align-left " style="background-image: url({{asset('template2/images/img-bg-blog.png')}}); ">
        <div class="container ">
            <div class="page-title__content ">
                <h1 class="page-title__name ">Meus Bilhetes</h1>
            </div>
            
        </div>
    </div>
    <!-- .page-title -->

    <main class="page ">

        
        <section class="shopping-cart ">
    

    <div class="container">
       
        

        <div class="content ">
            <div class="row ">
                <div class="col-md-12 col-lg-12">
                    <div class="items ">
                       
                        @forelse ($myticket as $item)
                        <div class="product mb-3 ">
                            <div class="row ">
                                
                                    <div class="col-md-3 ">
                                        <a href="{{URL::to('/meusbilhetes/'.$item->id)}}">
                                        <img class="img-fluid mx-auto d-block image rounded" src="/storage/{{$item->ticket->event->image}}">
                                        </a>
                                    </div>
                                
                                <div class="col-md-8 ">
                                    <div class="info ">
                                        <div class="row ">
                                            <div class="col-md-8 product-name ">
                                                <div class="product-name ">
                                                    <a href="{{URL::to('/meusbilhetes/'.$item->id)}}">@if ($item->ticket->is_package == 0) Bilhete -  @else Pacote - @endif {{$item->event->name}}</a> <br>
                                                    <a href="{{URL::to('/meusbilhetes/'.$item->id)}}">{{$item->ticket->name}}</a> <br>
                                                    <a href="{{URL::to('/meusbilhetes/'.$item->id)}}">{{$item->ticket->description}}</a>
                                                    <div class="product-info ">
                                                        
                                                        <div>Quantidade: <span class="value">{{$item->qty}}</span></div>
                                                        <div>@if ($item->ticket->is_package == 0) Bilhete  @else Pacote @endif Utilizados: <span class="value">{{$item->selldetails->where('status',0)->count()}}</span></div>
                                                        <div>Preço Unitário: <span class="value">{{$item->ticket->price}} MT</span></div>
                                                        <div>Preço Total: <span class="value">{{$item->ticket->price*$item->qty}} MT</span></div>
                                                        <div>Transação: <span class="value">{{$item->transaction->reference}} | {{$item->transaction->method}}</span></div>
                                                        <div>Data da Compra: <span class="value">{{$item->transaction->created_at->format('d-M-Y')}}</span></div>
                                                        
                                                        <a href="{{URL::to('/meusbilhetes/'.$item->id)}}" class="m-4"> <div ><i class="las la-tag"></i>Ver bilhete</div></a>
 
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                       
                        @empty
                        <div class="product text-center">
                            <div class="row ">
                             <p>Não tem nenhum bilhete</p>
                             <i class="las la-shopping-cart la-10x"></i>
                             <a href="{{URL::to('/todos-eventos')}}">Ver Eventos</a>
                            </div>
                        </div>
                        @endforelse
                   
                        
                        
                    </div>
                </div>
                
            </div> 
        </div> 
    </div>
    
</section>
      
</main>
</main>
<!-- .site-main -->

@endsection