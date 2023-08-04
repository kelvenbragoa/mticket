<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title> Mticket - Ingressos para Eventos, Shows, Teatros, Cursos e mais</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="ingressos, tickets, mtickets" />
    <meta name="description" content="Mticket o seu app de bilhetes online" />

    <!-- favicons -->
    <link rel="shortcut icon" href="{{asset('template2/images/ttttt.png')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('template2/fonts/jost/stylesheet.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/line-awesome/css/line-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/fontawesome-pro/css/fontawesome.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/slick/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/quilljs/css/quill.bubble.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/quilljs/css/quill.core.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/quilljs/css/quill.snow.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/chosen/chosen.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/datetimepicker/jquery.datetimepicker.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/libs/venobox/venobox.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template2/assets/css/style.css')}}" />
    <!-- jQuery -->
    <script src="{{asset('template2/js/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('template2/libs/popper/popper.js')}}"></script>
    <script src="{{asset('template2/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template2/libs/slick/slick.min.js')}}"></script>
    <script src="{{asset('template2/libs/slick/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('template2/libs/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('template2/libs/quilljs/js/quill.core.js')}}"></script>
    <script src="{{asset('template2/libs/quilljs/js/quill.js')}}"></script>
    <script src="{{asset('template2/libs/chosen/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('template2/libs/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{asset('template2/libs/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('template2/libs/waypoints/jquery.waypoints.min.js')}}"></script>
    <!-- orther script -->
    <script src="{{asset('template2/js/main.js')}}"></script>
</head>

<body>
    <div id="wrapper">



        <header id="header" class="site-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-5">
                        <div class="site">
                            <div class="site__menu">
                                <h1 class="logo"><a href="{{URL::to('/')}}"> MTICKET </a></h1>
                                <a title="Menu Icon" href="#" class="site__menu__icon">
                                    <i class="las la-bars la-24-black"></i>
                                </a>
                                <div class="popup-background"></div>
                                <div class="popup popup--left">
                                    <a title="Close" href="#" class="popup__close">
                                        <i class="las la-times la-24-black"></i>
                                    </a>
                                    <!-- .popup__close -->
                                    <div class="popup__content">
                                        <div class="popup__user popup__box open-form">
                                                @auth
                                                <a title="Login" href="{{URL::to('/perfil')}}">Perfil</a>
                                                @else
                                                <a title="Login" href="{{URL::to('/login')}}">Entrar/Registrar</a>
                                                {{-- <a title="Sign Up" href="{{URL::to('/register')}}">Registrar</a> --}}
                                                @endauth
                                        </div>
                                        <div class="popup__user popup__box open-form">
                                            <a href="{{URL::to('/todos-eventos')}}" title="Eventos">Eventos</a>
                                        </div>

                                        @auth
                                        <div class="popup__user popup__box open-form">
                                            <a href="{{route('carrinho.index')}}" title="Carrinho">Carrinho</a>
                                        </div>

                                        <div class="popup__user popup__box open-form">
                                            <a href="{{route('meusbilhetes.index')}}" title="Carrinho">Meus Bilhetes</a>
                                        </div>
                                        @endauth

                                        @auth
                                        <div class="popup__user popup__box open-form">
                                            @if (Auth::user()->is_promotor == 1)
                                                <a href="{{route('eventos.create')}}" title="Organizar eventos">Organizar evento</a>
                                            @else
                                                <a href="{{URL::to('/ser-promotor')}}" title="Seja um promotor">Seja um promotor</a>
                                            @endif
                                        </div>
                                        @endauth

                                        {{-- <div class="popup__user popup__box open-form">
                                            @auth

                                                @if (Auth::user()->is_promotor == 1)
                                                    <a href="{{route('eventos.create')}}" title="Organizar eventos">Organizar evento</a>
                                                @endif

                                            @else
                                                <a href="{{URL::to('/ser-promotor')}}" title="Seja um promotor">Seja um promotor</a>
                                            @endauth
                                        </div> --}}
                                       
                                        <!-- .popup__user -->
                                        <div class="popup__destinations popup__box">
                                            <ul class="menu-arrow">
                                                <li>
                                                    <a title="Destinations" href="#">Cidades </a>
                                                    <ul class="sub-menu">
                                                        @foreach (\App\Models\Province::orderBy('name','asc')->get() as $item)
                                                            <li><a href="{{URL::to('/provincia/'.$item->id.'/eventos')}}" title="{{$item->name}}">{{$item->name}}</a></li>
                                                        @endforeach
                                                       
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .popup__menu -->
                                    </div>
                                    <!-- .popup__content -->
                                    <!-- .popup__button -->
                                </div>
                                <!-- .popup -->
                            </div>
                            <!-- .site__menu -->
                            <!-- .site__brand -->

                            
                            <div class="site__search layout-02">
                                <a title="Close" href="#" class="search__close">
                                    <i class="la la-times"></i>
                                </a>
                                <!-- .search__close -->
                                <form action="{{URL::to('/pesquisar-eventos')}}" method="GET" class="site-banner__search layout-02">
                                    @csrf
                                    <div class="field-input">
                                        <label for="s">Oque?</label>
                                        <input class="site-banner__search__input open-suggestion" id="s" type="text" name="category" placeholder="Oque?" autocomplete="off">
                                        <div class="search-suggestions name-suggestions">
                                            <ul>
                                                @foreach (\App\Models\Category::orderBy('name','asc')->get() as $item)
                                                <li><a href="#"><i class=""></i><span>{{$item->name}}</span></a></li>
                                                @endforeach
                                                {{-- <li><a href="#"><i class=""></i><span>Shows</span></a></li>
                                                <li><a href="#"><i class=""></i><span>Cursos</span></a></li>
                                                <li><a href="#"><i class=""></i><span>Passeios e tours</span></a></li>
                                                <li><a href="#"><i class=""></i><span>Esportes</span></a></li>
                                                <li><a href="#"><i class=""></i><span>Cinema</span></a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- .site-banner__search__input -->
                                    <div class="field-input">
                                        <label for="loca">Aonde?</label>
                                        <input class="site-banner__search__input open-suggestion" id="loca" type="text" name="province" placeholder="Aonde?" autocomplete="off">
                                        <div class="search-suggestions location-suggestions">
                                            <ul>
                                                
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
                            <!-- .site__search -->

                        </div>
                        <!-- .site -->
                    </div>
                    <!-- .col-md-6 -->
                    <div class="col-xl-6 col-7">
                        <div class="right-header align-right">
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                            @auth
                                            @if (Auth::user()->is_promotor == 1)
                                                <a href="{{route('eventos.create')}}" title="Organizar eventos">Organizar evento</a>
                                            @endif
                                            @else
                                                <a href="{{URL::to('/ser-promotor')}}" title="Seja um promotor">Seja um promotor</a>
                                            @endauth

                                    </li>
                                    @auth
                                    <li>
                                        <a href="{{route('carrinho.index')}}" title="Organizar eventos">Carrinho</a>
                                    </li>
                                    <li>
                                        <a href="{{route('meusbilhetes.index')}}" title="">Meus Bilhetes</a>
                                    </li>
                                    @endauth
                                   
                                    <li>
                                        
                                         <a href="{{URL::to('/todos-eventos')}}" title="Eventos">Eventos</a>

                                    <li>

                                            <!-- .popup-form -->
                                            <div class="right-header__search">
                                                <a title="Search" href="#" class="search-open">
                                                    <i class="las la-search la-24-black"></i>
                                                </a>
                                                <div class="site__search">
                                                    <a title="Close" href="#" class="search__close">
                                                        <i class="la la-times"></i>
                                                    </a>
                                                    <!-- .search__close -->
                                                    <form action="#" class="site__search__form" method="GET">
                                                        <div class="site__search__field">
                                                            <span class="site__search__icon">
                                                <i class="las la-search la-24-black"></i>
                                            </span>
                                                            <!-- .site__search__icon -->
                                                            <input class="site__search__input" type="text" name="s" placeholder="Search places, cities">
                                                        </div>
                                                        <!-- .search__input -->
                                                    </form>
                                                    <!-- .search__form -->
                                                </div>
                                                <!-- .site__search -->
                                            </div>
                                             @auth
                                             <div class="right-header__button btn">
                                                <a title="" href="{{URL::to('/perfil')}}">

                                                    <span>Perfil</span>
                                                </a>
                                            </div>
                                            @else
                                            <div class="right-header__button btn">
                                                <a title="" href="{{URL::to('/login')}}">

                                                    <span>Login</span>
                                                </a>
                                            </div>
                                                {{-- <a href="{{URL::to('/login')}}" title="Entrar">Entrar</a> --}}
                                            @endauth
                                            
                                            <!-- .right-header__button -->
                        </div>
                        <!-- .right-header -->
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container-fluid -->
        </header>
        <!-- .site-header -->
        <!-- .site-header -->
