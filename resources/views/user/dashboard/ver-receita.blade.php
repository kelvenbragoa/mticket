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
                    <li>
                        <a href="{{route('bar.index')}}">Bar</a>
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
                    <p>Número de Vendas:{{$sell_number}}</p>
                    <p>Receita:{{$sell_amount}} MT</p>
                   
                </div>
                <!-- .member-wrap-top -->
                <a href="{{URL::to('user-ticket-report/'.$event->id)}}" class="btn btn-primary m-3"><h3>Baixar Relatório Completo</h3></a>
                
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
                            
                                <td data-title="ID">#{{$item->id}}</td>
                                <td data-title="Bilhete"><b>{{$item->ticket->name}}</b></td>
                                <td data-title="Cliente"><b>{{$item->user->name ?? 'Venda física'}}</b></td>
                                <td data-title="Valor"><b>{{$item->sell->price}}</b></td>
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
                <div class="d-flex pagination justify-content-center">
                    
                        {!! $sell_details->links() !!}
                   
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