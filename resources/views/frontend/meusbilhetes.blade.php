@extends('layouts.master')
@section('content')

<main id="main " class="site-main ">
    <div class="page-title page-title--small align-left " style="background-image: url({{asset('template2/images/img-bg-blog.png')}}); ">
        <div class="container ">
            <div class="page-title__content ">
                <h1 class="page-title__name ">Meus Bilhetes</h1>
            </div>
            
        </div>
    </div>
    <!-- .page-title -->

    <div class="container">
       
        <div class="row">
            @foreach ($myticket as $item)
            <div class="col-md-3 ">
                <img class="img-fluid mx-auto d-block image rounded mb-4" width="100" height="100" src="/storage/{{$item->ticket->event->image}}">
            </div>
            <div class="col-md-8 ">
                <div class="info ">
                    <div class="row ">
                        <div class="col-md-5 product-name ">
                            <div class="product-name ">
                                <a href="# ">{{$item->qty}}x{{$item->ticket->name}} - {{$item->ticket->price*$item->qty}} MT</a>
                                <a href="{{URL::to('/meusbilhetes/'.$item->id)}}">Ver bilhete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
        </div>

     
    </div>
    
</main>
<!-- .site-main -->

@endsection