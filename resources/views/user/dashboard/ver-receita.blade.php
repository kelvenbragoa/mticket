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
            <div class="member-place-wrap">
                <div class="member-wrap-top">
                    <h2>Vendas do Evento - {{$event->name}}</h2>
                    <p>Número de Vendas:{{$sells->sum('qty')}}</p>
                    <p>Receita:{{$sells->sum('total')}} MT</p>
                   
                </div>
                <!-- .member-wrap-top -->
                
                <table class="member-place-list table-responsive">
                    <thead>
                        <tr>
                           
                            
                            <th>ID</th>
                            <th>Bilhete</th>
                            <th>Cliente</th>
                            <th>Valor</th>
                            <th>Estado</th>
                            <th>Data da compra</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sell_details as $item)
                            <tr>
                            
                                <td data-title="ID">{{$item->id}}</td>
                                <td data-title="Bilhete"><b>{{$item->ticket->name}}</b></td>
                                <td data-title="Cliente"><b>{{$item->user->name}}</b></td>
                                <td data-title="Valor"><b>{{$item->ticket->price}}</b></td>
                                <td data-title="Estado">
                                    @if ($item->status == 1)
                                        <span style="color:green">Disponivel</span>

                                    @else
                                        <span style="color:red">Usado</span>
                                    @endif
                                </td>
                                <td data-title="Data da compra"><b>{{$item->created_at->format('d-m-Y')}}</b></td>
                               
                            </tr>
                        @empty
                            <tr>
                               <td colspan="5" align="center"> Nenhum venda para este evento !</td>
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