@extends('layouts.master')
@section('content')

<main id="main" class="site-main overflow">
    <section class="banner-wrap">
        <div class="flex">
            <div class="banner-left"></div>
            <div class="banner slick-sliders">
                <div class="banner-sliders slick-slider" data-item="1" data-arrows="false" data-dots="true">
                    <div class="item"><img src="{{asset('template/images/bg/bg-hero-1.jpeg')}}" alt="Banner"></div>
                    <div class="item"><img src="{{asset('template/images/bg/bg-hero-2.jpeg')}}" alt="Banner"></div>
                    <div class="item"><img src="{{asset('template/images/bg/bg-hero-3.jpeg')}}" alt="Banner"></div>
                    <div class="item"><img src="{{asset('template/images/bg/hero-img.png')}}" alt="Banner"></div>
                </div>
            </div>
            <!-- .banner -->
        </div>
        <div class="container">
            <div class="banner-content">
                <span class="offset-item">Eventos, Shows & Diversão</span>
                <h1 class="offset-item">O melhor da tua cidade!</h1>
                <form action="{{URL::to('/todos-eventos')}}" class="site-banner__search layout-02">
                    <div class="field-input">
                        <label for="s">Oque?</label>
                        <input class="site-banner__search__input open-suggestion" id="s" type="text" name="search" placeholder="Oque?" autocomplete="off">
                        <div class="search-suggestions name-suggestions">
                            <ul>
                                @foreach ($categories as $item)
                                    <li><a href=""><i class=""></i><span>{{$item->name}}</span></a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <!-- .site-banner__search__input -->
                    <div class="field-input">
                        <label for="loca">Aonde?</label>
                        <input class="site-banner__search__input open-suggestion" id="loca" type="text" name="province_id" placeholder="Aonde?" autocomplete="off">
                        <div class="search-suggestions location-suggestions">
                            <ul>
                                <li><a href="#"><i class="las la-location-arrow"></i><span>Todos Lugares</span></a></li>
                                @foreach (\App\Models\Province::orderBy('name','asc')->get() as $item)
                                <li><a href="#"><span>{{$item->name}}</span></a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <!-- .site-banner__search__input -->
                    <div class="field-submit">
                        <button><i class="las la-search la-24-black"></i></button>
                    </div>
                </form>
                <!-- .site-banner__search -->
            </div>
        </div>
    </section>
    <!-- .banner-wrap -->
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2 class="title title--more">Eventos populares

                    <a title="See all" href="{{URL::to('/todos-eventos')}}">Ver todos ({{count($events)}})</a>
                </h2>
            </div>
            <div class="restaurant-sliders slick-sliders offset-item">
                <div class="restaurant-slider slick-slider" data-item="4" data-itemScroll="4" data-arrows="true" data-dots="true" data-tabletItem="2" data-tabletScroll="2" data-mobileItem="1" data-mobileScroll="1">
                    
                    @forelse ($events as $item)

                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}"><img src="/storage/{{$item->image}}" alt=""></a>
                                <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist " data-place-id="185">
                                    <span class="icon-heart">
                                        <i class="la la-bookmark large"></i>
                                    </span>
                                </a>
                                <a class="entry-category rosy-pink" href="#">
                                    <i class="las la-user"></i><span>{{$item->user->company_name}}</span>
                                </a>
                                <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" title="Author"><img src="/storage/{{$item->user->image}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>{{$item->user->company_name}}</span>
                                    </div>
                                    <div class="place-city">
                                        <p>{{$item->city->name}}</p>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}">{!! Str::limit($item->name, 20) !!}</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
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
    <!-- .restaurant-wrap -->
    <section class="cuisine-wrap section-bg">
        <div class="container">
            <div class="title_home offset-item">
              
                <h2 class="title title--more">Descubra o que fazer

                    <a title="See all" href="{{URL::to('/todas-categorias')}}">ver todos ({{count($categories)}})</a>
                <p>Explore eventos shows, teatros, cursos</p>
            </div>
            <div class="cuisine-sliders slick-sliders offset-item">
                <div class="cuisine-slider slick-slider" data-item="6" data-itemScroll="6" data-arrows="true" data-dots="true" data-smallpcItem="4" data-smallpcScroll="4" data-tabletItem="3" data-tabletScroll="3" data-mobileItem="2" data-mobileScroll="2">
                    
                    @foreach ($categories as $item)

                        <div class="item">
                            <a href="{{URL::to('/categoria/'.$item->id.'/eventos')}}" title="{{$item->name}}">
                                <span class="hover-img"><img src="/storage/{{$item->image}}" alt="{{$item->name}}"></span>
                                <span class="title">{{$item->name}}</span>
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
    <!-- .cuisine-wrap -->

    <section class="join-wrap" style="background-image: url(images/bg/banner-1.jpeg);">
        <div class="container">
            <div class="title_home offset-item">
                <h2>O melhor de cada cidade</h2>
                <p>Explore eventos a partir das cidades</p>
            </div>
            <div class="row">

                @foreach (\App\Models\Province::orderBy('name','asc')->get() as $item)
                <div class="col-md-3">
                    <article class="post hover__box">
                        <div class="post__thumb hover-img">
                            <a title="Eventos por província" href="{{URL::to('/provincia/'.$item->id.'/eventos')}}"><img src="/storage/province/beira.jpeg" alt="Províncias"></a>
                        </div>
                        <div class="post__info">
                           
                            <h3 class="post__title"><a title="The 8 Most Affordable Michelin Restaurants in Paris" href="#">{{$item->name}} </a></h3>
                        </div>
                    </article>
                </div>
                @endforeach
                
                
             
                

            </div>
        </div>
    </section>
    <!-- .join-wrap -->


</main>
<!-- .site-main -->

@endsection