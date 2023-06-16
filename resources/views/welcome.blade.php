@extends('layouts.master')
@section('content')

<main id="main" class="site-main overflow">
    <!-- .restaurant-wrap -->
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2>Descubra o que fazer</h2>
                <p>Explore eventos shows, teatros, cursos</p>
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
        </div>
        <!-- .container -->
    </section>

    <!-- .banner-wrap -->
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2>Eventos populares</h2>
            </div>
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
                                            <span>{{$item->tickets->min('price')}}MT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nenhum evento !</p>
                    @endforelse
                    
                </div>
                <!-- .restaurant-slider -->
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
            <!-- .restaurant-sliders -->
        </div>
    </section>
    <section class="banner-wrap">
        <div class="container">
            <div class="banner-inner" style="background-image: url(template2/images/workspace/er.png);">
                <h2>Quer ser promotor?</h2>
                <p>Entre com a sua conta Mticket, e crie eventos fantasticos com a nossa companhia.</p>
                <a href="{{URL::to('/ser-promotor')}}" class="btn">Seja um Promotor</a>
            </div>
        </div>
    </section>
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2>Vistos Recentemente</h2>
            </div>
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
                                        <span>{{$item->tickets->min('price')}}MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>Nenhum evento !</p>
                    @endforelse
                    
                </div>
                <!-- .restaurant-slider -->
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
            <!-- .restaurant-sliders -->
        </div>
    </section>
    <!-- .banner-wrap -->

    <!-- .business-about -->
    <!-- .cuisine-wrap -->

    <div class="cities">
        <div class="container">
            <div class="title_home offset-item">
                <h2 class="cities__title title offset-item">O melhor de cada cidade</h2>
                <p>Explore eventos a partir das cidades</p>
            </div>
            <div class="cities__content offset-item">
                <div class="row">
                  
                    @foreach (\App\Models\Province::orderBy('name','asc')->get() as $item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="cities__item hover__box">
                                <div class="cities__thumb hover__box__thumb">
                                    <a title="{{$item->name}}" href="{{URL::to('/provincia/'.$item->id.'/eventos')}}">
                                        <img src="storage/{{$item->image}}" alt="{{$item->name}}">
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
            <!-- .cities__content -->
        </div>
    </div>

    <!-- .cities -->

    <!-- .featured-wrap -->
    <section class="join-wrap" style="background-image: url('template2/images/bg/banner-1.jpeg');">
   
        <div class="container">

        </div>
    </section>
    <!-- .join-wrap -->

    <!-- .testimonials -->
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2>Em alta</h2>
            </div>
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
                                        <span>{{$item->tickets->min('price')}}MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>Nenhum evento !</p>
                    @endforelse
                   
                </div>
                <!-- .restaurant-slider -->
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
                <div class="button-wrap">
                    <a href="{{URL::to('/todos-eventos')}}" class="btn" title="View more">Ver mais</a>
                </div>
                <!-- .place-slider__nav -->
            </div>
            <!-- .restaurant-sliders -->
        </div>
    </section>

    <!-- .blogs-wrap -->
</main>
<!-- .site-main -->

@endsection