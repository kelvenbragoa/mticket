@extends('layouts.master')
@section('content')

<main id="main " class="site-main ">
    <div class="page-title page-title--small align-left " style="background-image: url({{asset('template2/images/img-bg-blog.png')}}); ">
        <div class="container ">
            <div class="page-title__content ">
                <h1 class="page-title__name ">Obrigado pela sua compra!</h1>
            </div>
        </div>
    </div>
    <!-- .page-title -->
    <div class="site-content ">
        <div class="checkout-area checkout-thanks-area ">
            <div class="container ">
                <h2>Mticket</h2>
                <h3>Detalhes da compra</h3>
                <div class="order-detail ">
                    <p>
                        <span>Evento</span>
                        <span class="pakage-name ">{{$event->name}}</span>
                    </p>
                    <p>
                        <span>Numero de ingressos</span>
                        <span>{{$tickets->count()}}</span>
                    </p>
                    <p class="total ">
                        <span>Total</span>
                        <span>{{$total}} MT</span>
                    </p>
                </div>
                <div class="align-center ">
                    <a href="# " class="btn btn-print "><i class="las la-print "></i>Veja o seu ingresso</a>
                </div>
            </div>
        </div>
        <!-- .checkout-area -->
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->

@endsection