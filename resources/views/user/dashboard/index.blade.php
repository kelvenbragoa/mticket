@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    <div class="site-content owner-content">
       
       
    
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li class="active"><a href="{{route('painel.index')}}">Dashboard</a></li>
                    <li>
                        <a href="{{route('vendas.index')}}">Receita</a>
                    </li>
                    <li><a href="{{route('eventos.index')}}">Meus Eventos</a></li>
                    <li><a href="{{URL::to('/perfil')}}">Perfil</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
          
            @if (Session::has('message'))
            <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                {{Session::get('message')}}
            </div>
        @endif
            <div class="member-wrap">

                <!-- .member-wrap-top -->

                <!-- .upgrade-box -->
                <div class="member-statistical">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="item blue">
                                <h3>Eventos Aprovados</h3>
                                <span class="number">{{$approved_events_count}}</span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="item yellow">
                                <h3>Eventos Pendentes</h3>
                                <span class="number">{{$pending_events_count}}</span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="item red">
                                <h3>Eventos Cancelados</h3>
                                <span class="number">{{$canceled_events_count}}</span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="item red">
                                <h3>Total Eventos</h3>
                                <span class="number">{{$all_events}}</span>
                                <span class="line"></span>
                            </div>
                        </div>
                        {{--
                        <div class="col-lg-3 col-6">
                            <div class="item purple">
                                <h3>Total Views</h3>
                                <span class="number">145</span>
                                <span class="line"></span>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <!-- .member-statistical -->
                <div class="owner-box">
                    <div class="row">
                        <div class="col">
                            <div class="ob-item">
                                <div class="ob-head">
                                    <h3>Eventos Adicionados Recentemente</h3>
                                    <a href="{{route('eventos.index')}}" class="view-all" title="Ver todos">Ver todos</a>
                                </div>
                                <div class="ob-content">
                                    <ul>
                                        @foreach ($recent_events as $item)
                                        <li class="">
                                            <p class="date"><b>Data:</b>{{date('d-m-Y',strtotime($item->start_date))}}</p>
                                            <p class="place"><b>Nome:</b>{{$item->name}}</p>
                                            <p class="status"><b>Estado:</b><span>{{$item->status->name}}</span></p>
                                            <a href="{{URL::to('/eventos/'.$item->id.'/edit')}}" title="Editar" class="more"><i class="las la-angle-right"></i></a>
                                        </li>
                                        @endforeach
                                       
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{--
                        <div class="col-lg-4">
                            <div class="ob-item">
                                <div class="ob-head">
                                    <h3>New Reviews</h3>
                                    <a href="#" class="view-all" title="View All">View all</a>
                                </div>
                                <div class="ob-content">
                                    <ul class="place__comments">
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Sebastian" href="#"><img src="images/avatars/male-2.jpg" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                    <a title="Sebastian" href="#">Sebastian</a>
                                                    <div class="place__author__star">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <span style="width: 72%">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                            </span>
                                                    </div>
                                                    <span class="time">October 1, 2019</span>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience. </p>
                                            </div>
                                            <p class="place"><b>Place:</b>Vago Restaurant</p>
                                        </li>
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Sebastian" href="#"><img src="images/avatars/male-1.jpg" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                    <a title="Sebastian" href="#">Sebastian</a>
                                                    <div class="place__author__star">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <span style="width: 72%">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                            </span>
                                                    </div>
                                                    <span class="time">October 1, 2019</span>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience. </p>
                                            </div>
                                            <p class="place"><b>Place:</b>Renew Body Spa</p>
                                        </li>
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Sebastian" href="#"><img src="images/avatars/female-1.jpg" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                    <a title="Sebastian" href="#">Sebastian</a>
                                                    <div class="place__author__star">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <span style="width: 72%">
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                                <i class="la la-star"></i>
                                                            </span>
                                                    </div>
                                                    <span class="time">October 1, 2019</span>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience. </p>
                                            </div>
                                            <p class="place"><b>Place:</b>Bamboo Hotel Paris</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ob-item">
                                <div class="ob-head">
                                    <h3>Notifications <span>(5)</span></h3>
                                    <a href="#" class="clear-all" title="Clear All">Clear all</a>
                                </div>
                                <div class="ob-content">
                                    <ul>
                                        <li class="noti-item unread">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                        <li class="noti-item read">
                                            <p>You have got a new booking <br> Booking ID: #123434</p>
                                            <span>1d ago</span><a href="#" class="delete-noti" title="Delete">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <!-- .owner-box -->
            </div>
            <!-- .member-wrap -->
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->


  
@endsection