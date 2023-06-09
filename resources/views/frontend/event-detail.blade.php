@extends('layouts.master')
@section('content')

<main id="main" class="site-main single single-02">
    <div class="place">
        <div class="single-slider slick-sliders">
            <div class="slick-slider" data-item="1" data-arrows="true" data-itemscroll="1" data-dots="true" data-infinite="true" data-centermode="true" data-centerpadding="418px" data-tabletitem="1" data-tabletscroll="1" data-tabletpadding="70px" data-mobileitem="1"
                data-mobilescroll="1" data-mobilepadding="30px">
                <div class="place-slider__item bd">
                    <a title="Place Slider Image" href="#"><img src="/storage/{{$event->image}}" alt="slider-01"></a>
                </div>
                 <div class="place-slider__item bd">
                    <a title="Place Slider Image" href="#"><img src="/storage/{{$event->image}}" alt="slider-02"></a>
                </div>
                {{--<div class="place-slider__item bd">
                    <a title="Place Slider Image" href="#"><img src="/storage/{{$event->image}}" alt="slider-03"></a>
                </div>
                <div class="place-slider__item bd">
                    <a title="Place Slider Image" href="#"><img src="/storage/{{$event->image}}" alt="slider-05"></a>
                </div>
                <div class="place-slider__item bd">
                    <a title="Place Slider Image" href="#"><img src="/storage/{{$event->image}}" alt="slider-06"></a>
                </div> --}}
            </div>
            <!-- .page-title -->
            <div class="place-share">
                <a title="Save" href="#" class="add-wishlist">
                    <i class="la la-bookmark large"></i>
                </a>
                <a title="Share" href="#" class="share">
                    <i class="la la-share-square la-24"></i>
                </a>

            </div>
            <!-- .place-share -->
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
        <!-- .place-slider -->
        {{-- <div class="page-title page-title--small align-left" style="background-image: url(/storage/{{$event->image}});">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">Evento</h1>
                    <p class="page-title__slogan">{{$event->name}}</p>
                </div>
            </div>
        </div> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar sidebar-shadow sidebar-sticky">
                        <aside class="widget widget-sb-detail">
                           
                            <div class="widget-top">
                                <div class="flex">
                                    <div class="store-detail">
                                        <span class="open">A venda</span>
                                        <img src="/storage/{{$event->user->image}}" alt="Autor">

                                    </div>

                                </div>
                            </div>
                            <div class="map-detail">
                                <div id="map"></div>
                                <div class="map-local"><i class="las la-directions"></i></div>
                                <a href="#" class="direction btn" target="_blank">Direções<i class="las la-external-link-alt"></i></a>
                            </div>

                           <div class="business-info">
                            <h4>Informações</h4>
                            <ul>
                                <li><i class="las la-clock"></i> <a>{{date('l M Y',strtotime($event->start_date))}}</a></li>
                                <li><i class="las la-tag"></i> <a>{{$event->tickets->count()}} Bilhetes disponíveis</a></li>
                                <li><i class="las la-map-marked-alt large"></i><a>{{$event->address}} - {{$event->city->name}}</a></li>
                                <li><i class="la la-phone large"></i> <a href="tel:{{$event->phone}}">{{$event->phone}}</a></li>
                                <li><i class="la la-globe large"></i> <a href="{{$event->website}}">{{$event->website}}</a></li>
                            </ul>
                            <div class="button-wrap">
                                <div class="button"><a href="{{URL::to('/checkout/'.$event->id.'/evento')}}" class="btn">Proceder</a></div>

                            </div>
                        </div>
                         
                           
                           
                        </aside>
                        <!-- .widget-reservation -->
                    </div>
                    <!-- .sidebar -->
                </div>
                <div class="col-lg-8">
                    <div class="place__left">
                        <ul class="place__breadcrumbs breadcrumbs">
                            <li><a title="France" href="">{{$event->province->name}}</a></li>
                            <li><a title="Paris" href="">{{$event->city->name}}</a></li>
                            <li>
                                <a title="Eat & Drink" href="">{{$event->address}}</a>
                            </li>
                        </ul>
                        <!-- .place__breadcrumbs -->
                        <div class="place__box place__box--npd">
                            <div class="shop-details__thumb">
                                <a title="{{$event->name}}" href=""><img src="/storage/{{$event->image}}" alt="Image"></a>
                            </div>
                            <h1>{{$event->name}}</h1>
                            <div class="place__meta">
                                <div class="place__reviews reviews">
                                    <like-button event_id="{{$event->id}}" like = "{{ $like }}"></like-button> 
                                    {{-- <follow-button user-id="{{$event->id}}" follows = "{{ $event->id }}">a</follow-button> --}}
                                    <span class="place__reviews__number reviews__number">
                                        {{$event->like->count()}}										
                                        <i class="la la-heart"></i>
                                    </span>
                                    <span class="place__places-item__count reviews_count">({{$event->review->count()}} Comentários)</span>
                                </div>
                                <div class="place__currency">{{$event->tickets()->count()}} Bilhetes</div>
                                <div class="place__category">
                                    <a title="Restaurant" href="#">{{$event->category->name}}</a>
                                    <a title="Bar" href="#">{{$event->secondcategory->name}}</a>
                                </div>
                            </div>
                            <!-- .place__meta -->
                        </div>
                        <!-- .place__box -->


                        <div class="business-info">
                            <h4>Informações Eventos</h4>
                            <ul>
                                <ol><i class="las la-map-marked-alt large"></i> <a href="#">{{$event->address}} - {{$event->city->name}} </a></ol>
                                <ol><i class="las la-envelope"></i><a href="mailto:{{$event->email}}">{{$event->email}}</a></ol>
                                <ol><i class="la la-phone large"></i> <a href="tel:+31 20-235-2117">{{$event->phone}}</a></ol>

                                @if ($event->website != null) <ol><i class="la la-globe large"></i> <a href="{{$event->website}}" target="_blank">{{$event->website}}</a></ol> @endif 
                                @if ($event->facebook != null)<ol><i class="la la-facebook large"></i> <a href="{{$event->facebook}}" target="_blank">{{$event->facebook}}</a></ol>@endif 
                                @if ($event->instagram != null)<ol><i class="la la-instagram large"></i> <a href="{{$event->instagram}}" target="_blank">{{$event->instagram}}</a></ol>@endif 
                                @if ($event->twitter != null)<ol><i class="la la-twitter large"></i> <a href="{{$event->twitter}}" target="_blank">{{$event->twitter}}</a></ol>@endif 
                                @if ($event->youtube != null)<ol><i class="la la-youtube large"></i> <a href="{{$event->youtube}}" target="_blank">Clique aqui</a></ol>@endif 
                            </ul>
                            <hr>
                           
                        </div>

                        <!-- .place__box -->
                        <div class="place__box place__box-overview">
                            <h3>Descrição</h3>
                            <div class="place__desc">{{$event->description}}</div>
                            <!-- .place__desc -->
                            <a href="#" class="show-more" title="Show More">Show more</a>
                        </div>
                        <div class="place__box place__box-map">
                            <h3 class="place__title--additional">
                                Line Up e Momentos
                            </h3>
                            <div class="menu-tab">
                                <ul>
                                    <li class="active"><a href="#lineup" title="Diner Menu">LineUp e Momentos</a></li>
                                    
                                </ul>
                                <div class="menu-wrap active" id="lineup">
                                    <div class="flex">
                                        @forelse ($event->lineups->sortBy('id') as $item)
                                        <div class="menu-item">
                                            <img src="/storage/sys/musci.jpeg" alt="music">
                                            <div class="menu-info">
                                                <h4>{{$item->name}}</h4>
                                                
                                                <p>{{$item->description}}</p>
                                                <span class="price">{{date('H:i',strtotime($item->start_time))}} até {{date('H:i',strtotime($item->end_time))}}</span>
                                               
                                            </div>
                                        </div>
                                        @empty
                                        <div class="menu-item">
                                            <p>Ainda não foi definido os lineups e momentos do evento.</p>
                                        </div>
                                        @endforelse
                                       
                                       
                                    </div>
                                    <a href="#" class="menu-more">Mais</a>
                                </div>
                            </div>
                        </div>

                        <!-- .place__box -->
                        <div class="place__box">
                            <h3>Duvidas?</h3>
                            <ul class="faqs-accordion">
                                <li>
                                    <h4>Em caso de cancelamento de evento?</h4>
                                    <div class="desc">
                                        <p>Em caso de cancelamento do evento o promotor irá informar em relação a proxima data.</p>
                                    </div>
                                </li>
                                <li>
                                    <h4>Os ingressos não adiquiridos na plataforma mticket?</h4>
                                    <div class="desc">
                                        <p>A aquisição dos ingressos para eventos só serão aceites se forem adiquiridos a partir da plataforma.</p>
                                    </div>
                                </li>
                                <li>
                                    <h4>Como é feito o scan</h4>
                                    <div class="desc">
                                        <p>Após a aquisição do ingresso irá receber o mesmo em forma de QrCode, baste que apresente na portaria.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- .place__box -->
                        
                        <div class="place__box place__box--reviews">
                            <h3 class="place__title--reviews">
                                Comentários({{$event->review->count()}})
                                <span class="place__reviews__number">
                                    {{$event->like->count()}}									
                                    <i class="la la-heart"></i>
                                </span>
                            </h3>
                            <div class="review-form">
                                <h3>Escrever um comentário</h3>
                                <form action="{{route('review.store')}}" method="POST">
                                   @csrf
                                    <div class="field-textarea">
                                        <img class="author-avatar" src="/storage/{{Auth::user()->image ?? 'profile/default.jpg'}}" alt=""> 
                                        <textarea name="review" placeholder="Escrever um comentário"></textarea>
                                        <input type="hidden" value="{{$event->id}}" name="event_id">
                                        
                                    </div>
                                    @auth
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                        <div class="field-submit">
                                            <input type="submit" class="btn" value="Submeter">
                                        </div>
                                    @else
                                        <div class="field-submit">
                                            <button class="btn" style="background-color: red">Comentar</button>
                                        </div>
                                    @endauth
                                    
                                </form>
                            </div>
                            <br>

                            <ul class="place__comments">

                                @foreach ($event->review as $item)
                                <li>
                                    <div class="place__author">
                                        <div class="place__author__avatar">
                                            <a title="{{$item->user->name}}" ><img src="/storage/{{$item->user->image ?? 'profile/default.jpg'}}" alt=""></a>
                                        </div>
                                        <div class="place__author__info">
                                            <a title="Sebastian" >{{$item->user->name}}</a>
                                           
                                            <span class="time">{{$item->created_at->format('l M')}}</span>
                                        </div>
                                    </div>
                                    <div class="place__comments__content">
                                        <p>{{$item->review}}.</p>
                                    </div>
                                    @if ($item->reply != null)
                                    <a  class="place__comments__reply">
                                        <i class="la la-comment-dots"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Chiemeka" ><img src="/storage/{{$event->user->image ?? 'profile/default.jpg'}}" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                    <a title="Chiemeka" >{{$event->user->name}}</a>

                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Top Top, isso vai arder.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    @endif
                                </li>

                                @endforeach
                                
                                {{-- <li>
                                    <div class="place__author">
                                        <div class="place__author__avatar">
                                            <a title="Nitithorn" href="#"><img src="/storage/{{Auth::user()->image ?? 'profile/default.jpg'}}" alt=""></a>
                                        </div>
                                       
                                    </div>
                                    <div class="place__comments__content">
                                        <p>Isso já foi, não vejo a hora de chegar o dia.</p>
                                    </div>
                                    <a title="Reply" href="#" class="place__comments__reply">
                                        <i class="la la-comment-dots"></i> Responder
                                    </a>
                                </li> --}}
                            </ul>
                            
                        </div>
                        <!-- .place__box -->
                    </div>
                    <!-- .place__left -->
                </div>
                
            </div>
        </div>
    </div>
    <!-- .place -->
    <div class="similar-places">
        <div class="container">
            <div class="title">
                <h2>Eventos similares</h2>
            </div>
            <div class="similar-places__content">
                <div class="row">

                    @foreach ($event_recomended as $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="place-item layout-02 place-hover" data-maps_name="myticket">
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
                                                <a href="">{{$item->city->name}}</a>
                                            </div>
                                        </div>
                                        <h3 class="place-title"><a title="{{$item->name}}" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}">{!! Str::limit($item->name, 20) !!}</a></h3>
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

                    @endforeach
                    




               
                </div>
            </div>
        </div>
    </div>
    <!-- .similar-places -->
</main>
<!-- .site-main -->

@endsection