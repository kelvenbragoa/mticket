@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    <div class="site-content owner-content">
       
       
    
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li><a href="{{route('painel.index')}}">Dashboard</a></li>
                    <li class="active">
                        <a href="{{route('vendas.index')}}">Receita</a>
                    </li>
                    <li  ><a href="{{route('eventos.index')}}">Meus Eventos</a></li>
                    
                    <li><a href="{{URL::to('home')}}">Perfil</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            @if (Session::has('message'))
            <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                {{Session::get('message')}}
            </div>
        @endif
            <div class="member-place-wrap">
                <div class="member-wrap-top">
                    <h2>Vendas do Evento - {{$event->name}}</h2>
                   
                </div>
                <!-- .member-wrap-top -->
                
                <table class="member-place-list table-responsive">
                    <thead>
                        <tr>
                           
                            
                            <th>ID</th>
                            <th>Bilhete</th>
                            <th>Cliente</th>
                            <th>Valor</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sells as $item)
                            <tr>
                            
                                <td data-title="ID">{{$item->id}}</td>
                                <td data-title="Nome"><b>{{$item->ticket->name}}</b></td>
                                <td data-title="Nome"><b>{{$item->user->name}}</b></td>
                                <td data-title="Nome"><b>{{$item->ticket->price}}</b></td>
                               
                            </tr>
                        @empty
                            <tr>
                                Nenhum venda para este evento !
                            </tr>
                        @endforelse
                        
                        
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    
                        {!! $sells->links() !!}
                   
                </div>
                <!-- .pagination -->
            </div>
            <!-- .member-place-wrap -->
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->


  
@endsection