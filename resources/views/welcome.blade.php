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
                    {{-- <div class="item">
                        <a href="categorydetails.html" title="Pizza">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/festas.jpeg')}}" alt="Pizza"></span>
                            <span class="title">Festas e shows<span class="number">(34)</span></span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="categorydetails.html" title="Fastfood">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/infantil.jpeg')}}" alt="Fastfood"></span>
                            <span class="title">Infantil<span class="number">(57)</span></span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="categorydetails.html" title="Vegatarian">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/teatro.jpeg')}}" alt="Vegatarian"></span>
                            <span class="title">Teatros e espetaculos<span class="number">(85)</span></span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="categorydetails.html" title="Vietnamese">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/arraia.jpeg')}}" alt="Pizza"></span>
                            <span class="title">Eventos<span class="number">(34)</span></span>
                        </a>
                    </div>

                    <div class="item">
                        <a href="categorydetails.html" title="Italian">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/stand.jpeg')}}" alt="Italian"></span>
                            <span class="title">Stand Up Comedy<span class="number">(48)</span></span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="categorydetails.html" title="Japan">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/palestra.jpeg')}}" alt="Japan"></span>
                            <span class="title">Congressos e palestras<span class="number">(12)</span></span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="categorydetails.html" title="Vietnamese">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/food.jpeg')}}" alt="Pizza"></span>
                            <span class="title">Gastronomia<span class="number">(34)</span></span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="categorydetails.html" title="Mexican">
                            <span class="hover-img"><img src="{{asset('template2/images/menu/esportes.jpeg')}}" alt="Mexican"></span>
                            <span class="title">Esportes<span class="number">(22)</span></span>
                        </a>
                    </div> --}}
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
                                    <a class="entry-thumb" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}"><img src="/storage/{{$item->image}}" alt="$item->user->company_name"></a>


                                    <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" title="Author"><img src="/storage/{{$item->user->image}}" alt="$item->user->company_name"></a>
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
                                    <div class="entry-bottom">
                                        <div class="place-preview">
                                            <div class="place-rating">
                                                <span>DOM, 14 MAR - 15:30</span>
    
                                            </div>
    
                                        </div>
                                        <div class="place-price">
                                            <span>1500MT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nenhum evento !</p>
                    @endforelse
                    {{-- <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>Bilhetes a venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
            <div class="banner-inner" style="background-image: url(images/workspace/er.png);">
                <h2>Quer ser promotor?</h2>
                <p>Entre com a sua conta Mticket, e crie eventos fantasticos com a nossa companhia.</p>
                <a href="{{URL::to('/login')}}" class="btn">Entrar</a>
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
                                    <a class="entry-thumb" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}"><img src="/storage/{{$item->image}}" alt="$item->user->company_name"></a>


                                    <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" title="Author"><img src="/storage/{{$item->user->image}}" alt="$item->user->company_name"></a>
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
                                    <div class="entry-bottom">
                                        <div class="place-preview">
                                            <div class="place-rating">
                                                <span>DOM, 14 MAR - 15:30</span>
    
                                            </div>
    
                                        </div>
                                        <div class="place-price">
                                            <span>1500MT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nenhum evento !</p>
                    @endforelse
                    {{-- <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>Bilhetes a venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                                    <a title="Maputo" href="{{URL::to('/provincia/'.$item->id.'/eventos')}}">
                                        <img src="{{asset('template2/images/city/maputo.jpg')}}" alt="{{$item->name}}">
                                    </a>
                                </div>
                                <h4 class="cities__name">{{$item->name}}</h4>
                                <div class="cities__info">
                                    <h3 class="cities__capital">{{$item->name}}</h3>
                                    <p class="cities__number">{{$item->events->count()}} Eventos</p>
                                </div>
                            </div>
                            <!-- .cities__item -->
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="cities__item hover__box">
                            <div class="cities__thumb hover__box__thumb">
                                <a title="Beira" href="beiracity.html">
                                    <img src="{{asset('template2/images/city/beira.jpg')}}" alt="Barca">
                                </a>
                            </div>
                            <h4 class="cities__name">Sofala</h4>
                            <div class="cities__info">
                                <h3 class="cities__capital">Beira</h3>
                                <p class="cities__number">92 places</p>
                            </div>
                        </div>
                        <!-- .cities__item -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cities__item hover__box">
                            <div class="cities__thumb hover__box__thumb">
                                <a title="Nampula" href="nampulacity.html">
                                    <img src="{{asset('template2/images/city/nampula.jpg')}}" alt="New York">
                                </a>
                            </div>
                            <h4 class="cities__name">Nampula</h4>
                            <div class="cities__info">
                                <h3 class="cities__capital">Nampula</h3>
                                <p class="cities__number">64 places</p>
                            </div>
                        </div>
                        <!-- .cities__item -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cities__item hover__box">
                            <div class="cities__thumb hover__box__thumb">
                                <a title="Tete" href="tetecity.html">
                                    <img src="{{asset('template2/images/city/tet.jpg')}}" alt="Paris">
                                </a>
                            </div>
                            <h4 class="cities__name">Tete</h4>
                            <div class="cities__info">
                                <h3 class="cities__capital">Tete</h3>
                                <p class="cities__number">23 places</p>
                            </div>
                        </div>
                        <!-- .cities__item -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cities__item hover__box">
                            <div class="cities__thumb hover__box__thumb">
                                <a title="Chimoio" href="chimoiocity.html">
                                    <img src="{{asset('template2/images/city/chimo.jpg')}}" alt="Amsterdam">
                                </a>
                            </div>
                            <h4 class="cities__name">Manica</h4>
                            <div class="cities__info">
                                <h3 class="cities__capital">Chimoio</h3>
                                <p class="cities__number">44 places</p>
                            </div>
                        </div>
                        <!-- .cities__item -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cities__item hover__box">
                            <div class="cities__thumb hover__box__thumb">
                                <a title="Pemba" href="pembacity.html">
                                    <img src="{{asset('template2/images/city/pemb.jpg')}}" alt="Singapo">
                                </a>
                            </div>
                            <h4 class="cities__name">Cabo Delgado</h4>
                            <div class="cities__info">
                                <h3 class="cities__capital">Pemba</h3>
                                <p class="cities__number">60 places</p>
                            </div>
                        </div>
                        <!-- .cities__item -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cities__item hover__box">
                            <div class="cities__thumb hover__box__thumb">
                                <a title="Quelimane" href="quelimanecity.html">
                                    <img src="{{asset('template2/images/city/queli.jpg')}}" alt="Sydney">
                                </a>
                            </div>
                            <h4 class="cities__name">Zambezia</h4>
                            <div class="cities__info">
                                <h3 class="cities__capital">Quelimane</h3>
                                <p class="cities__number">36 places</p>
                            </div>
                        </div>
                        <!-- .cities__item -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cities__item hover__box">
                            <div class="cities__thumb hover__box__thumb">
                                <a title="Inhambane" href="vilanculoscity.html">
                                    <img src="{{asset('template2/images/city/inha.jpg')}}" alt="angeles">
                                </a>
                            </div>
                            <h4 class="cities__name">Inhambane</h4>
                            <div class="cities__info">
                                <h3 class="cities__capital">Inhambane</h3>
                                <p class="cities__number">44 places</p>
                            </div>
                        </div>
                        <!-- .cities__item -->
                    </div> --}}

                </div>
            </div>
            <!-- .cities__content -->
        </div>
    </div>

    <!-- .cities -->

    <!-- .featured-wrap -->
    <section class="join-wrap" style="background-image: url(images/bg/banner-1.jpeg')}});">
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
                                    <a class="entry-thumb" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                    <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" title="Author"><img src="/storage/{{$item->user->image}}" alt="Author"></a>
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
                                    <h3 class="place-title"><a href="evento.html">{!! Str::limit($item->name, 20) !!}</a></h3>
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
                                    <div class="entry-bottom">
                                        <div class="place-preview">
                                            <div class="place-rating">
                                                <span>DOM, 14 MAR - 15:30</span>

                                            </div>

                                        </div>
                                        <div class="place-price">
                                            <span>1500MT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nenhum evento !</p>
                    @endforelse
                    {{-- <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>Bilhetes a venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="evento.html"><img src="{{asset('template2/images/listing/Festa do Branco Euro.jpeg')}}" alt=""></a>


                                <a href="#" class="author" title="Author"><img src="{{asset('template2/images/avatars/male-3.jpg')}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>Nome Promotor</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">Beira</a>
                                    </div>
                                </div>
                                <h3 class="place-title"><a href="evento.html">Festa do Branco</a></h3>
                                <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                <div class="entry-bottom">
                                    <div class="place-preview">
                                        <div class="place-rating">
                                            <span>DOM, 14 MAR - 15:30</span>

                                        </div>

                                    </div>
                                    <div class="place-price">
                                        <span>1500MT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                    <a href="bilhetes.html" class="btn" title="View more">Ver mais</a>
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