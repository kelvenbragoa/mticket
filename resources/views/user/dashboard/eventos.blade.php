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
                           
                            
                            <th>ID</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Cidade</th>
                            <th>Província</th>
                            <th>Categoria</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $item)
                            <tr>
                            
                                <td data-title="ID">{{$item->id}}</td>
                                <td data-title="Thumb"><img src="/storage/{{$item->image}}" alt="Cartaz"></td>
                                <td data-title="Place name"><b>{{$item->name}}</b></td>
                                <td data-title="City">{{$item->city->name}}</td>
                                <td data-title="City">{{$item->city->name}}</td>
                                <td data-title="Category">{{$item->category->name}}</td>
                                <td data-title="Status" class="{{$item->status->alias}}">{{$item->status->name}}</td>
                                <td data-title="" class="place-action">
                                    <a href="{{URL::to('/eventos/'.$item->id.'/edit')}}" class="edit" title="Edit"><i class="las la-edit"></i></a>
                                    <a href="#" class="view" title="View"><i class="la la-eye"></i></a>
                                    <a href="#" class="delete" title="Delete"><i class="la la-trash-alt"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                Nenhum evento !
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