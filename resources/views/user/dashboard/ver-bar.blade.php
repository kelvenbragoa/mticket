@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    <div class="site-content owner-content">
       
       
    
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li><a href="{{route('painel.index')}}">Dashboard</a></li>
                    <li>
                        <a href="{{route('vendas.index')}}">Receita</a>
                    </li>
                    <li class="active">
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
                    <p>Número de Vendas:{{$sells_bar->count()}}</p>
                    <p>Receita:{{$sells_bar->sum('total')}} MT</p>
                   
                </div>
                
                <a href="{{URL::to('user-bar-report/'.$event->id)}}" class="btn btn-primary"><h3>Baixar Relatório Completo</h3></a>
                
                <!-- .member-wrap-top -->
                
                <table class="member-place-list table-responsive">
                    <thead>
                        <tr>
                           
                            
                            <th>Data</th>
                            <th>Recibo#</th>
                            <th>Valor</th>
                            <th>Pagamento</th>
                            <th>Venda efetuada por</th>
                            <th>Venda verificada por</th>
                            <th>Estado</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sells_bar as $item)
                            <tr>
                            
                                <td data-title="Data">{{$item->created_at->format('d-M H:i')}}</td>
                                <td data-title="ID"><b>#{{$item->id}}</b></td>
                                <td data-title="Total"><b>{{$item->total}} MT</b></td>
                                <td data-title="Method"><b>{{$item->method}}</b></td>
                                <td data-title="Venda por"><b>{{$item->user->name ?? '-'}}</b> </td>
                                <td data-title="Venda verificada por"><b>{{$item->verified_by_user->name ?? '-'}}</b> </td>
                                <td data-title="Estado">
                                    @if ($item->status == 1)
                                    <span>Não verificada</span>

                                    @else
                                    <span>Verificada</span>
                                    @endif
                                </td>
                                
                               
                            </tr>
                        @empty
                            <tr>
                               <td colspan="5" align="center"> Nenhum venda para este evento !</td>
                            </tr>
                        @endforelse
                        
                        
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    
                       
                   
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