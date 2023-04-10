<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>MyTicket</title>
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- favicons -->
        <link rel="shortcut icon" href="{{asset('template/images/favicon.ico')}}">
    
        <!-- Style CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('template/fonts/jost/stylesheet.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/line-awesome/css/line-awesome.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/fontawesome-pro/css/fontawesome.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/bootstrap/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/slick/slick-theme.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/slick/slick.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/quilljs/css/quill.bubble.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/quilljs/css/quill.core.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/quilljs/css/quill.snow.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/chosen/chosen.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/datetimepicker/jquery.datetimepicker.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/libs/venobox/venobox.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('template/css/responsive.css')}}" />
        <!-- jQuery -->
        <script src="{{asset('template/js/jquery-1.12.4.js')}}"></script>
        <script src="{{asset('template/libs/popper/popper.js')}}"></script>
        <script src="{{asset('template/libs/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('template/libs/slick/slick.min.js')}}"></script>
        <script src="{{asset('template/libs/slick/jquery.zoom.min.js')}}"></script>
        <script src="{{asset('template/libs/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('template/libs/quilljs/js/quill.core.js')}}"></script>
        <script src="{{asset('template/libs/quilljs/js/quill.js')}}"></script>
        <script src="{{asset('template/libs/chosen/chosen.jquery.min.js')}}"></script>
        <script src="{{asset('template/libs/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('template/libs/venobox/venobox.min.js')}}"></script>
        <script src="{{asset('template/libs/waypoints/jquery.waypoints.min.js')}}"></script>
        <!-- orther script -->
        <script src="{{asset('template/js/main.js')}}"></script>
    </head>
    
    <body>
        <div id="wrapper">
    
    
    
            <header id="header" class="site-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-5">
                            <div class="site">
                                <div class="site__menu">
                                    <h1 class="logo"><a href="/">MyTicket</a></h1>
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
                                                <a title="Login" href="{{URL::to('/home')}}" class="open-login">Perfil</a>
                                                @else
                                                <a title="Login" href="{{URL::to('/login')}}" class="open-login">Entrar</a>
                                                <a title="Sign Up" href="{{URL::to('/register')}}" class="open-signup">Registrar</a>
                                                @endauth
                                            </div>
                                            <!-- .popup__user -->
                                         
                                        </div>
                                        <div class="popup__content">
                                            <div class="popup__user popup__box open-form">
                                                @auth
                                                @if (Auth::user()->is_promotor == 1)
                                                    <a href="{{route('eventos.create')}}" title="Organizar eventos">Organizar evento</a>
                                                @endif
                                                
                                                 @else
                                                <a href="{{URL::to('/ser-promotor')}}" title="Seja um promotor">Seja um promotor</a>
                                            @endauth
                                               
                                            </div>
                                            <!-- .popup__user -->
                                         
                                        </div>
                                        <div class="popup__content">
                                            <div class="popup__user popup__box open-form">
                                                
                                                <a href="{{URL::to('/todos-eventos')}}" title="Eventos">Eventos</a>
                                         
                                               
                                            </div>
                                            <!-- .popup__user -->
                                         
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
                                        <li>
                                            <a href="{{URL::to('/todos-eventos')}}" title="Eventos">Eventos</a>
                                        </li>
                                        <li>
                                           
                                            @auth
                                                
                                            @else
                                                <a href="{{URL::to('/login')}}" title="Entrar">Entrar</a>
                                            @endauth

                                        </li>
    
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
                                                        <a title="Add place" href="{{URL::to('/home')}}">
        
                                                            <span>Perfil</span>
                                                            
                                                        </a>
                                                        
                                                    </div>
                                                @else
                                                    <div class="right-header__button btn">
                                                        <a title="Add place" href="{{URL::to('/register')}}">
        
                                                            <span>Cadastre-se</span>
                                                        </a>
                                                    </div>
                                                @endauth
                                                
                                            
                                        </li>
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