@extends('layouts.master')
@section('content')

<main id="main " class="site-main ">
    <div class="page-title page-title--small align-left " style="background-image: url({{asset('template2/images/bg/bg-checkout.png')}}); ">
        <div class="container ">
            <div class="page-title__content ">
                <h1 class="page-title__name ">Pagamentos</h1>
                
            </div>
        </div>
    </div>
    <main class="page ">
        <section class="shopping-cart ">
            <div class="container ">
            <form action="{{route('checkout.store')}}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">    
               <div class="content ">
                    <div class="row ">
                        <div class="col-md-12 col-lg-8 ">
                            <div class="items ">
                                
                                @forelse ($tickets as $item)
                                <div class="product mb-3 ">
                                    <div class="row ">
                                        <div class="col-md-3 ">
                                            <img class="img-fluid mx-auto d-block image rounded" src="/storage/{{$event->image}}">
                                        </div>
                                        <div class="col-md-8 ">
                                            <div class="info ">
                                                <div class="row ">
                                                    <div class="col-md-5 product-name ">
                                                        <div class="product-name ">
                                                            <a href="# ">{{$item->name}}</a>
                                                            <div class="product-info ">
                                                                <div>Termina: <span class="value ">{{date('d-m-Y',strtotime($item->end_date))}}, {{date('H:i',strtotime($item->end_time))}}</span></div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (date('Y-m-d H:i') > date('Y-m-d H:i',strtotime("$item->end_date $item->end_time")))
                                                    <div class="col-md-4 quantity ">
                                                        
                                                        <button class="btn btn-danger " style="background-color:red;">Esgotado</button>
                                                            
                                                        
                                                       
                                                    </div>
                                                    @else
                                                    <div class="col-md-4 quantity ">
                                                        <label for="quantity ">Quantidade:</label>
                                                        
                                                            <div class="shop-details__quantity ">
                                                                <span class="plus ">											
                                                                        <i class="la la-plus "></i>
                                                                </span>
                                                                            
                                                                <input type="number" name="quantity[]" value="0" class="qty ">
                                                                <input type="hidden" name="ticket_id[]" value="{{$item->id}}">
                                                                <input type="hidden" name="price[]" value="{{$item->price}}">
                                                                <span class="minus ">		
                                                                        <i class="la la-minus "></i>
                                                                </span>
                                                            </div>
                                                        
                                                       
                                                    </div>
                                                    @endif
                                                   
                                                    <div class="col-md-3 price ">
                                                        <span>{{$item->price}}MT</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="product ">
                                    <div class="row ">
                                     <p>Ainda não bilhetes para este evento</p>
                                    </div>
                                </div>
                                @endforelse
                           
                                
                                
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 ">
                            <div class="summary ">
                                <h3>Total</h3>
                                {{--<div class="summary-item "><span class="text ">Subtotal</span><span class="price ">0 MT</span></div>
                                <div class="summary-item "><span class="text ">Descontos</span><span class="price ">0 MT</span></div>
                                <div class="summary-item "><span class="text ">Enviou</span><span class="price ">0 MT</span></div> --}}
                                <div class="summary-item "><span class="text ">Total</span><span class="price ">0 MT</span></div>
                                <hr>
                                {{-- <a href="" class="btn btn-primary btn-lg btn-block " title="Pagar ">Efetuar pagamento</a> --}}
                                @auth
                                    <button class="btn btn-primary btn-lg btn-block " type="submit">Efetuar pagamento</button>
                                @else
                                    <a class="btn btn-primary btn-lg btn-block " href="{{route('login')}}">Login</a>
                                @endauth
                                
                            </div>
                        </div>
                    </div> 
                </form>
                </div>
            </div>
      
   </main>

    <!-- .page-title -->
    
<!-- .shop-details -->

<!-- .other-products -->
</main>
<!-- .site-main -->

@endsection