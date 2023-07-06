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


            <div class="mb-4">
                @if (Session::has('messageError'))
                       
                <div class="alert alert-danger" role="alert">
                    {{Session::get('messageError')}}
                  </div>
            @endif
                @if (Session::has('messageSuccess'))
                       
                <div class="alert alert-success" role="alert">
                    {{Session::get('messageSuccess')}}
                  </div>
            @endif
            </div>
            <form action="{{route('carrinho.store')}}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">    
               <div class="content ">
                    <div class="row ">
                        <div class="col-md-12 col-lg-8 ">
                            <h3>Bilhetes Disponíveis</h3>
                            <div class="items ">
                               
                                @forelse ($event->tickets as $item)
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
                                                                <div>Inicio: <span class="value ">{{date('d-m-Y',strtotime($item->start_date))}}, {{date('H:i',strtotime($item->start_time))}}</span></div>
                                                                <div>Termino: <span class="value ">{{date('d-m-Y',strtotime($item->end_date))}}, {{date('H:i',strtotime($item->end_time))}}</span></div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (date('Y-m-d H:i') > date('Y-m-d H:i',strtotime("$item->end_date $item->end_time")) || $item->max_qtd <= 0 || date('Y-m-d H:i') <= date('Y-m-d H:i',strtotime("$item->start_date $item->start_time")))
                                                    <div class="col-md-4 quantity ">
                                                        
                                                        <a class="btn btn-danger " style="background-color:rgb(212, 212, 212);">Indisponível</a>
                                                            
                                                    </div>
                                                    @else
                                                    <div class="col-md-4 quantity ">
                                                        <label for="quantity ">Quantidade:</label>
                                                        
                                                            <div class="shop-details__quantity ">
                                                                <span class="plus ">											
                                                                        <i class="la la-plus "></i>
                                                                </span>
                                                                            
                                                                <input type="number" name="quantity[]" id="qtd" value="0" max="10" readonly class="qty">
                                                                <input type="hidden" name="ticket_id[]" value="{{$item->id}}">
                                                                <input type="hidden" name="price[]" id="price" value="{{$item->price}}">
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

                            <hr>
                            <h3>Pacotes Disponíveis</h3>
                            <div class="items ">
                               
                                @forelse ($event->packages as $item)
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
                                                                <div><span class="value">{{$item->description}}</span></div>
                                                                
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4 quantity ">
                                                        <label for="quantity ">Quantidade:</label>
                                                        
                                                            <div class="shop-details__quantity ">
                                                                <span class="plus ">											
                                                                        <i class="la la-plus "></i>
                                                                </span>
                                                                            
                                                                <input type="number" name="quantity[]" id="qtd" value="0" max="10" readonly class="qty">
                                                                <input type="hidden" name="ticket_id[]" value="{{$item->id}}">
                                                                <input type="hidden" name="price[]" id="price" value="{{$item->price}}">
                                                                <span class="minus ">		
                                                                        <i class="la la-minus "></i>
                                                                </span>
                                                            </div>
                                                        
                                                       
                                                    </div>
                                                  
                                                   
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
                                     <p>Ainda não pacotes para este evento</p>
                                    </div>
                                </div>
                                @endforelse
                           
                                
                                
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 text-center">
                            <div class="summary ">
                                
                                <h3>Proceder para a compra</h3>
                                


                               
                                @auth
                              

                                <button class="btn btn-primary btn-lg btn-block " type="submit">Proceder</button>
                                @else
                                    <a class="btn btn-primary btn-lg btn-block " style="background-color: rgb(0, 140, 233)" href="{{route('login')}}">Comprar</a>
                                @endauth
                                
                            </div>
                        </div>
                    </div> 
                </div> 
                </form>
                </div>
            </div>
        </section>
      
   </main>

    <!-- .page-title -->
    
<!-- .shop-details -->

<!-- .other-products -->
</main>
<!-- .site-main -->



@endsection