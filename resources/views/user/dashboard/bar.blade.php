@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    <div class="site-content owner-content">
       
       
    
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li><a href="{{route('painel.index')}}">Dashboard</a></li>
                    <li >
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
                    <h2>Meus Eventos</h2>
                   
                </div>
                <!-- .member-wrap-top -->
                
                <table class="member-place-list table-responsive">
                    <thead>
                        <tr>
                           
                            
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Vendas</th>
                            <th>Valor</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $item)
                            <tr>
                            
                                <td data-title="ID">{{$item->id}}</td>
                                <td data-title="Nome"><b>{{$item->name}}</b></td>
                                <td data-title="Data">{{date('d-m-Y',strtotime($item->start_date))}}</td>
                                <td data-title="Vendas">{{$item->sell_bar->count()}}</td>
                                <td data-title="Valor">{{$item->sell_bar->sum('total')}} MT</td>
                               
                                <td data-title="Estado" class="{{$item->status->alias}}">{{$item->status->name}}</td>
                                <td data-title="" class="place-action">
                                  
                                    <a href="{{URL::to('/bar/'.$item->id.'')}}" class="view" title="Ver"><i class="la la-eye"></i></a>
                          
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" align="center">Nenhum evento !</td> 
                            </tr>
                        @endforelse
                        
                        
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    
                        {!! $events->links() !!}
                   
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