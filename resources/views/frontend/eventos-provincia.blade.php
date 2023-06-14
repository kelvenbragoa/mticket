@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    <div class="page-title" style="background-image: url('{{asset('template2/images/city/banner33.jpg')}}');">
        <div class="container">
            <div class="page-title__content">
                <h4 class="page-title__capita">Moçambique</h4>
                <h1 class="page-title__name">{{$provincia->name}}</h1>
                {{-- <p class="page-title__slogan">Chimoio é a capital da província moçambicana de Manica.</p> --}}
            </div>
        </div>
    </div>
    <!-- .page-title -->
    <div class="intro">
        <div class="container">
            <h2 class="title">{{$provincia->name}}</h2>
            <div class="intro__content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="intro__text">Encontramos em Chimoio paisagens, fontes e cascatas, embelezadas por um conjunto de montanhas que fazem as delícias de quem gosta de montanhismo.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="intro__meta">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="intro__meta__item">
                                        <h3>Moeda</h3>
                                        <p>
                                            <i class="la la-money-bill"></i>
                                            <span>Metical</span>
                                        </p>
                                    </div>
                                    <!-- .intro__meta__item -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="intro__meta__item">
                                        <h3>Lingua</h3>
                                        <p>
                                            <i class="la la-globe"></i>
                                            <span>Português</span>
                                        </p>
                                    </div>
                                    <!-- .intro__meta__item -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="intro__meta__item">
                                        <h3>Melhor tempo para visitar</h3>
                                        <p>
                                            <i class="la la-clock"></i>
                                            <span>Todos</span>
                                        </p>
                                    </div>
                                    <!-- .intro__meta__item -->
                                </div>
                            </div>
                        </div>
                        <!-- .intro__meta -->
                    </div>
                </div>
            </div>
            <!-- .intro__content -->
        </div>
    </div>
    <!-- .intro -->

    <section class="restaurant-wrap">
    <div class="city-content">
        <div class="city-content__tabtitle tabs">
            <div class="container">
                <div class="city-content__tabtitle__tablist">
                    <ul>
                        <li class="active"><a title="Eventos" href="#eventos">Eventos</a></li>

                    </ul>
                </div>
                <!-- .city-content__tabtitle__tablist -->
                <a class="city-content__tabtitle__button btn btn-mapsview" title="Maps view" href="maps-view.html">
                    <i class="la la-map-marked-alt la-24"></i> Mapa
                </a>
                <!-- .city-content__tabtitle__button -->
            </div>
        </div>
        <!-- .city-content__tabtitle -->
        <div class="city-content__panels">
            <div class="container">
                <div class="city-content__panel" id="eventos">
                    <div class="city-content__item">
                        <h2 class="title title--more">
                            Em alta
                            <a title="See all" href="{{URL::to('todos-eventos')}}">Ver todos</a>
                        </h2>
                        <div class="restaurant-sliders slick-sliders offset-item">
                            <div class="restaurant-slider slick-slider" data-item="4" data-itemScroll="4" data-arrows="true" data-dots="true" data-tabletItem="2" data-tabletScroll="2" data-mobileItem="1" data-mobileScroll="1">
                                @forelse ($events as $item)
                                <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                                    <div class="place-inner">
                                        <div class="place-thumb hover-img">
                                            <a class="entry-thumb" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}"><img src="/storage/{{$item->image}}"></a>
        
        
                                            <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" ><img src="/storage/{{$item->user->image}}"></a>
                                        </div>
                                        <div class="entry-detail">
                                            <div class="entry-head">
                                                <div class="place-type list-item">
                                                    <span>{{$item->user->company_name}}</span>
                                                </div>
                                                <div class="place-city">
                                                    <a href="#">{{$item->city->name}}</a>
                                                </div>
                                            </div>
                                            <h3 class="place-title"><a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}">{!! Str::limit($item->name, 20) !!}</a></h3>
                                            @if (date('Y-m-d H:i') > date('Y-m-d H:i',strtotime("$item->end_date $item->end_time")))
                                                <div class="close-now"><i class="las la-door-closed"></i>Encerado</div>
                                            @else
                                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                            @endif
                                            <div class="entry-bottom">
                                                <div class="place-preview">
                                                    <div class="place-rating">
                                                        <span>{{$item->like->count()}}</span>
                                                        <i class="la la-heart"></i>
                                                        
        
                                                    </div>
        
                                                </div>
                                                <div class="place-price">
                                                    <span>{{count($item->tickets)}} Bilhetes</span>
                                                </div>
                                                
                                                
                                               
                                            </div>
                                            <div class="entry-bottom">
                                                <div class="place-preview">
                                                    <div class="place-rating">
                                                        {{-- <span>DOM, 14 MAR - 15:30</span> --}}
                                                        <span>{{date('l d M',strtotime($item->start_date))}}</span>
            
                                                    </div>
            
                                                </div>
                                                <div class="place-price">
                                                    <span>{{$item->tickets->min('price')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>Nenhum evento !</p>
                                @endforelse
                                
                                
                                
                               
                            <!-- .city-slider__grid -->
                            <div class="city-slider__nav slick-nav">
                                <div class="city-slider__prev slick-nav__prev">
                                    <i class="la la-arrow-left"></i>
                                </div>
                                <!-- .city-slider__prev -->
                                <div class="city-slider__next slick-nav__next">
                                    <i class="la la-arrow-right"></i>
                                </div>
                                <!-- .city-slider__next -->
                            </div>
                            <!-- .city-slider__nav -->
                        </div>
                        <!-- .city-slider -->
                    </div>
                    <br>
                   

                    <!-- .city-content -->
                    <div class="other-city banner-white">
                        <div class="container">
                            <h2 class="title title--more">
                                Explorar outras cidades
                                
                            </h2>

                            <div class="other-city__content">
                                <div class="row">
                                    @foreach ($provinces as $item)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="cities__item hover__box">
                                            <div class="cities__thumb hover__box__thumb">
                                                <a title="{{$item->name}}"  href="{{URL::to('/provincia/'.$item->id.'/eventos')}}">
                                                    <img src="/storage/{{$item->image}}">
                                                </a>
                                            </div>
                                            <h4 class="cities__name">{{$item->name}}</h4>
                                            <div class="cities__info">
                                                <h3 class="cities__capital">{{$item->name}}</h3>
                                                <p class="cities__number">{{$item->events->where('status_id',2)->count()}} Eventos</p>
                                            </div>
                                        </div>
                                        <!-- .cities__item -->
                                    </div>
                                    @endforeach
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .other-city -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>


@endsection