@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>

    @import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

    body,
    html {
        height: 100vh;
        display: grid;
        font-family: "Staatliches", cursive;
        background: #ffff;
        color: black;
        font-size: 14px;
        letter-spacing: 0.1em;
    }




    .ticketgeneral {

        height: 100vh;
        display: grid;
        font-family: "Staatliches", cursive;
        background: #ffff;
        color: black;
        font-size: 14px;
        letter-spacing: 0.1em;

    }
    


    .ticket {
        margin: auto;
        display: flex;
        background: white;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        margin-bottom: 5px;
    }


    .left {
        display: flex;
    }
    
    .image {
        height: 250px;
        width: 250px;
        background-image: url("/storage/{{$event->image}}");
        background-size: contain;
        opacity: 0.85;
    }
    
    .admit-one {
        position: absolute;
        color: darkgray;
        height: 250px;
        padding: 0 10px;
        letter-spacing: 0.15em;
        display: flex;
        text-align: center;
        justify-content: space-around;
        writing-mode: vertical-rl;
        transform: rotate(-180deg);
    }
    
    .admit-one span:nth-child(2) {
        color: white;
        font-weight: 700;
    }
    
    .left .ticket-number {
        height: 250px;
        width: 250px;
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
        padding: 5px;
    }
    
    .ticket-info {
        padding: 10px 30px;
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: space-between;
        align-items: center;
    }
    
    .date {
        border-top: 1px solid gray;
        border-bottom: 1px solid gray;
        padding: 5px 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    
    .date span {
        width: 100px;
    }
    
    .date span:first-child {
        text-align: left;
    }
    
    .date span:last-child {
        text-align: right;
    }
    
    .date .june-29 {
        color: #d83565;
        font-size: 20px;
    }
    
    .show-name {
        font-size: 20px;
        font-family: "Open Sans", cursive;
        color: #d83565;
    }
    
    .show-name h1 {
        font-size: 38px;
        font-weight: 700;
        letter-spacing: 0.1em;
        /* color: #04aff4; */
        color: black;
    }
    
    .time {
        padding: 10px 0;
        /* color: #04aff4; */
        color: black;
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-weight: 700;
    }
    
    .time span {
        font-weight: 400;
        color: gray;
    }
    
    .left .time {
        font-size: 16px;
    }
    
    .location {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        padding-top: 8px;
        border-top: 1px solid gray;
    }
    
    .location .separator {
        font-size: 20px;
    }
    
    .right {
        width: 180px;
        border-left: 1px dashed #404040;
    }
    
    .right .admit-one {
        color: darkgray;
    }
    
    .right .admit-one span:nth-child(2) {
        color: gray;
    }
    
    .right .right-info-container {
        height: 250px;
        padding: 10px 10px 10px 35px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }
    
    .right .show-name h1 {
        font-size: 18px;
    }
    
    .barcode {
        height: 100px;
    }
    
    .barcode img {
        height: 100%;
    }
    
    .right .ticket-number {
        color: gray;
    }
    
    .cardticket {
       
        align-items: center;
        padding: 10px 30px;
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: space-between;
        align-items: center;
        max-width: 50ch;
    
    }
    
    .cardticket p {
        color: black
    }
    </style>
@section('content')
<main id="main " class="site-main ">
    <div class="page-title page-title--small align-left " style="background-image: url({{asset('template2/images/img-bg-blog.png')}}); ">
        <div class="container ">
            <div class="page-title__content ">
                <h1 class="page-title__name ">Visualização Meu Bilhetes</h1>
            </div>
            
        </div>
    </div>
    <!-- .page-title -->

    <main class="page">

        <section class="shopping-cart ">
        <div class="container">

        <div class="content ">
           
            <div class="row ">
                
                <div class="col-md-12 col-lg-12">
                    <div class="right-header__button btn m-2">
                        <a title="" href="{{URL::to('/meusbilhetes/'.$sell->id.'/download')}}">
                            <span>Baixar Bilhete</span>
                        </a>
                    </div>
                    <div class="ticketgeneral ">

                        @php
                            $i = 1;
                        @endphp

                        @foreach ($detail as $item)
                       
                    
                        <div class="ticket">
                            <div class="left">
                                <div class="image">
                                    <p class="admit-one">
                                        <span>Mticket</span>
                                        <span>Mticket</span>
                                        <span>Mticket</span>
                                    </p>
                                    <div class="ticket-number">
                                        <p>
                                            #0{{$item->id}}
                                        </p>
                                    </div>
                                </div>
                                <div class="ticket-info">
                                    <p class="date">
                                        <span>{{date('l',strtotime($item->event->start_date))}}</span>
                                        <span class="june-29">{{date('d-m',strtotime($item->event->start_date))}}</span>
                                        <span>{{date('Y',strtotime($item->event->start_date))}}</span>
                                    </p>
                                    <div class="show-name">
                                        <h1>{{$item->event->name}}</h1>
                                        <br>
                                        <h2>{{Auth::user()->name}}</h2>
                                        <h2>{{$item->ticket->name}}</h2>
                                        <div class="cardticket">
                                            <p>{{$item->ticket->description}}</p>
                                        </div>
                                        
                                    </div>
                                    <div class="time">
                    
                                        <p>{{date('H:i',strtotime($item->event->start_time))}}</p>
                                    </div>
                                    <p class="location"><span>{{$item->event->address}}</span>
                                        <span class="separator"> 
                                        @if ($item->status == 0)
                                            <i class="fas fa-frown" style="color:red"></i>
                                        @else
                                            <i class="fas fa-smile" style="color:green"></i>
                                        @endif  
                                        </span><span>{{$item->event->province->name}}, Moçambique</span>
                                    </p>
                                </div>
                            </div>
                            <div class="right">
                                <p class="admit-one">
                                    <span>Mticket</span>
                                    <span>Mticket</span>
                                    <span>Mticket</span>
                                </p>
                                <div class="right-info-container">
                                    <div class="show-name">
                                        <h1>{{$item->event->name}}</h1>
                    
                                    </div>
                                    <div class="time">
                                        <p>{{date('H:i',strtotime($item->event->start_time))}}<span>ATÉ</span> {{date('H:i',strtotime($item->event->end_time))}}</p>
                                        {{-- <p>DOORS <span>@</span> {{date('H:i',strtotime($item->event->start_time))}}</p> --}}
                                    </div>
                                    <div class="barcode">
                                        @php
                                            $myObj = new stdClass();
                                            // $myObj->nome = Auth::user()->name;
                                            // $myObj->email = Auth::user()->email;
                                            // $myObj->evento = $event->name;
                                            // $myObj->ticket = $item->ticket->name;
                                            // $myObj->data = $event->start_date;
                                            $myObj->s = $item->status;
                                            $myObj->i = $item->id;
                                            $myObj->ie = $item->event->id;
                                            
                    
                                            $myJSON = json_encode($myObj);
                                        @endphp
                                        {!!QrCode::generate($myJSON);!!}
                                    </div>
                                    <p class="ticket-number">
                                        #0{{$item->id}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        

                        @php
                            $i = $i + 1;
                        @endphp
                        @endforeach
                        
                        
                    </div>
                </div>
                
            </div> 
        </div> 
    </div>
    
</section>
      
</main>
</main>
<!-- .site-main -->
@endsection