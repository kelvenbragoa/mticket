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
                    <li  class="active"><a href="{{route('eventos.index')}}">Meus Eventos</a></li>
                   
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
        @if (Session::has('messageError'))
            <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                {{Session::get('messageError')}}
            </div>
        @endif
            <div class="member-place-wrap">
                <div class="member-wrap-top">
                    <h2>Bilhetes do Evento - {{$event->name}} </h2>  
                </div>
                <!-- .member-wrap-top -->
                <a href="{{URL::to('/eventos/'.$event->id.'/edit')}}" title="Genaral"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a> <br>
                <a href="{{URL::to('/bilhete/'.$event->id.'/add')}}" class="btn btn-pill btn-warning"><i class="far fa-plus"></i>Adicionar Bilhetes</a>
                
                <table class="member-place-list table-responsive">
                    <thead>
                        <tr>
                           
                            
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Data/Hora Inicio</th>
                            <th>Data/Hora Fim</th>
                            <th>Descrição</th>
                            <th>Max</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $item)
                            <tr>
                            
                                <td data-title="Nome">{{$item->name}}</td>
                                <td data-title="Preço">{{$item->price}}</td>
                                <td data-title="Data/Hora Inicio">{{ date('d-m-Y',strtotime($item->start_date))}} / {{$item->start_time}}</td>
                                <td data-title="Data/Hora Fim">{{date('d-m-Y',strtotime($item->end_date))}} / {{$item->end_time}}</td>
                                <td data-title="Descrição">{{$item->description}}</td>
                                <td data-title="Max">{{$item->max_qtd}} Unidades</td>
                                <td data-title="" class="place-action">
                                    <a href="{{URL::to('/bilhete/'.$event->id.'/evento/'.$item->id.'/edit')}}" class="edit" title="Edit"><i class="las la-edit"></i></a>
                                    <form method="POST" action="{{ route('tickets.destroy', $item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                    <button title="Delete" onclick="this.form.submit();" style="background:none;
                                    border:none;
                                    margin:0;
                                    padding:0;
                                    cursor: pointer;"><i class="la la-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Nenhum Bilhete para este evento !</td>
                                
                            </tr>
                        @endforelse
                        
                        
                    </tbody>
                </table>
                <!-- .pagination -->
            </div>
            <!-- .member-place-wrap -->
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->


  
@endsection