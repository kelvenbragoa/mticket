@extends('layouts.master')
@section('content')

<main id="main" class="site-main overflow">
    {{-- <section class="banner-wrap">
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
                                @foreach (\App\Models\Category::get() as $item)
                                    <li><a href="#"><i class=""></i><span>{{$item->name}}</span></a></li>
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
    <!-- .banner-wrap --> --}}
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2 class="title title--more">
                    @if ($search_events == null)
                    Todos Eventos
                     @endif
                     @if ($events == null)
                    Você pesquisou por: {{ app('request')->input('search') }}
                     @endif
                    

                    <a title="Ver todas categorias" href="{{URL::to('/todas-categorias')}}">Ver categorias</a>
                </h2>
            </div>
            

            <div class="row">
                @if ($search_events == null)
                @forelse ($events as $item)
                <div class="col-sm-3 mb-2">
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}"><img src="/storage/{{$item->image}}" alt=""></a>
                               
                                <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" title="Author"> <img src="/storage/{{$item->user->image}}" alt="Author"></a>
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
                </div>
            @empty
                <p>Nenhum evento</p>
            @endforelse
            @endif

            @if ($events == null)
            @forelse ($search_events as $item)
            <div class="col-sm-3">
                <div class="place-item layout-02 place-hover" data-maps_name="myticket">
                    <div class="place-inner">
                        <div class="place-thumb hover-img">
                            <a class="entry-thumb" href=""><img src="/storage/{{$item->image}}" alt=""></a>
                            <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist " data-place-id="185">
                                <span class="icon-heart">
                                    <i class="la la-bookmark large"></i>
                                </span>
                            </a>
                            <a class="entry-category rosy-pink" href="#">
                                <i class="las la-user"></i><span>{{$item->user->name}}</span>
                            </a>
                            <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" title="Author"> <img src="/storage/{{$item->user->image}}" alt="Author"></a>
                        </div>
                        <div class="entry-detail">
                            <div class="entry-head">
                                <div class="place-type list-item">
                                    <span>{{$item->user->name}}</span>
                                </div>
                                <div class="place-city">
                                    <a href="#">{{$item->city->name}}</a>
                                </div>
                            </div>
                            <h3 class="place-title"><a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}">{{$item->name}}</a></h3>
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
            </div>
        @empty
            <p>Nenhum evento</p>
        @endforelse
            @endif
                
              



                
           
                </div>
                   
        
        </div>
    </section>

 
  

</main>
<!-- .site-main -->



@endsection