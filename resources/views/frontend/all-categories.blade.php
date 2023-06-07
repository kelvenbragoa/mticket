@extends('layouts.master')
@section('content')

<main id="main" class="site-main overflow">
    
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2 class="title title--more">Todas Categorias</h2>
                <a title="Ver todos eventos" href="{{URL::to('/todas-eventos')}}">Todos Eventos</a>
            </div>
            

            <div class="cuisine-sliders slick-sliders offset-item">
                <div class="cuisine-slider slick-slider" data-item="6" data-itemScroll="6" data-arrows="true" data-dots="true" data-smallpcItem="4" data-smallpcScroll="4" data-tabletItem="3" data-tabletScroll="3" data-mobileItem="2" data-mobileScroll="2">
                   
                    @foreach ($categories as $item)
                    <div class="item">
                        <a href="{{URL::to('/categoria/'.$item->id.'/eventos')}}" title="{{$item->name}}">
                            <span class="hover-img"><img src="/storage/{{$item->image}}" alt="{{$item->name}}"></span>
                            <span class="title">{{$item->name}}<span class="number">({{$item->events->count()}})</span></span>
                        </a>
                    </div>
                    @endforeach

                </div>
                <!-- .cuisine-slider -->
                <div class="place-slider__nav slick-nav">
                    <div class="place-slider__prev slick-nav__prev">
                        <i class="las la-angle-left"></i>
                    </div>
                    <!-- .place-slider__prev -->
                    <div class="place-slider__next slick-nav__next">
                        <i class="las la-angle-right"></i>
                    </div>
                    <!-- .place-slider__next -->
                </div>
                <!-- .place-slider__nav -->
            </div>
            <!-- .cuisine-sliders -->

            {{-- <div class="row">
                @foreach ($categories as $item)
                <div class="col-sm-2">
                   
                    
                    
                        
                            <a href="{{URL::to('/categoria/'.$item->id.'/eventos')}}" title="{{$item->name}}">
                                <span class="hover-img"> <img src="/storage/{{$item->image}}"  alt="{{$item->name}}" class="rounded-circle"></span>
                               
                            </a>
                            <p class="text-center">{{$item->name}}</p>
                            <br>
                              
                </div>

                @endforeach
              



                
           
                </div> --}}
                   
        
        </div>
    </section>

 
  

</main>
<!-- .site-main -->

@endsection