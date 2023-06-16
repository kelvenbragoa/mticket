@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Evento</h1>

    @if (Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    @include('superadmin.events.modaledit')
    @include('superadmin.events.modaladd')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-body">
                   

                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Informações Gerais do Evento</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p>Estado: @if ($event->status_id == 1) <span class="badge bg-danger">Cancelado</span> @endif @if($event->status_id == 2) <span class="badge bg-success">Aprovado</span> @endif @if($event->status_id == 3) <span class="badge bg-warning">Pendente</span> @endif <a href=""data-toggle="modal" data-target="#modaledit"><i class="far fa-edit"></i>Alterar</a></p>
                            <p><strong>Nome</strong>: {{$event->name}}</p>
                            <p><strong>Data Inicio</strong>: {{date('d-m-Y',strtotime($event->start_date))}} | {{$event->start_time}}</p>
                            <p><strong>Data Termíno</strong>: {{date('d-m-Y',strtotime($event->end_date))}} | {{$event->end_time}}</p>
                            <p><strong>Descrição do Evento</strong>: {{$event->description}}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
                <hr>
                <div class="card">
                <div class="card-body">

                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Localização</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p><strong>Localização</strong>: {{$event->location}}</p>
                            <p><strong>Endereço</strong>: {{$event->address}}</p>
                            <p><strong>Cidade</strong>: {{$event->city->name}}</p>
                            <p><strong>Provincia</strong>: {{$event->province->name}}</p>
                        </div>
                    </div>
                </div>
            </div>

                    <hr>
                    <div class="card">
                    <div class="card-body">
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Categoria do Evento</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p><strong>Categoria Principal</strong>: {{$event->category->name}}</p>
                            <p><strong>Categoria Secundária</strong>: {{$event->secondcategory->name}}</p>
                        </div>
                       
                    </div>
                    </div>
                    </div>
                    <hr>
                    <div class="card">
                    <div class="card-body">
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Contactos Usuário</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p><strong>Usuário</strong>: {{$event->user->name}}</p>
                            <p><strong>Email do Usuário</strong>: {{$event->user->email}}</p>
                            <p><strong>Telefone do Usuário</strong>: {{$event->user->mobile}}</p>
                        </div>
                       
                    </div>
                    </div>
                    </div>
                    <hr>
                    <div class="card">
                    <div class="card-body">
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Contactos Evento</strong></h3>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <p><strong>Email</strong>: {{$event->email}}</p>
                            <p><strong>Telefone</strong>: {{$event->phone}}</p>
                            <p><strong>Email</strong>: {{$event->email}}</p>
                            <p><strong>Website</strong>: {{$event->website}} <a href="{{$event->website}}">Aceder</a></p>
                            <p><strong>Instagram</strong>: {{$event->instagram}} <a href="{{$event->instagram}}">Aceder</a></p>
                            <p><strong>Facebook</strong>: {{$event->facebook}} <a href="{{$event->facebook}}">Aceder</a></p>
                            <p><strong>Twitter</strong>: {{$event->twitter}} <a href="{{$event->twitter}}">Aceder</a></p>
                            <p><strong>Youtube</strong>: {{$event->youtube}} <a href="{{$event->youtube}}">Aceder</a></p>
                        </div>
                       
                    </div>
                    </div>
                    </div>

                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <div class="row mb-2 mb-xl-3">
                                <div class="col-auto d-none d-sm-block">
                                    <h3><strong>Protocolos do Evento</strong></h3>
                                </div>
                            </div>
                            <a href="" data-toggle="modal" data-target="#modaladd" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar</a>
                           
                        </div>
                    <div class="card-body">
                   

                    <div class="row">

                        <div class="col-12">
                            <p><strong>Número</strong>: {{$event->protocols->count()}}</p>
                            <div class="table-responsive">
                                <table class="table display" >
                                    <thead>
                                        <tr>
                                            <th style="width:15%;">Nome</th>
                                            <th style="width:15%;">Telefone</th>
                                            <th style="width:15%;">BI</th>
                                            <th style="width:15%;">Usuario</th>
                                            <th style="width:15%;">Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->protocols as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->mobile}}</td>
                                                <td>{{$item->bi}}</td>
                                                <td>{{$item->user}}</td>
                                                <td>{{$item->password}}</td>
                                                {{-- <td class="table-action">
                                                    
                                                     <a href="{{URL::to('/events/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <a href="{{URL::to('/events/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                                </td> --}}
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <hr>
                    <div class="card">
                    <div class="card-body">
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Bilhetes do Evento</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p><strong>Número</strong>: {{$event->tickets->count()}}</p>
                            <div class="table-responsive">
                                <table class="table display" >
                                    <thead>
                                        <tr>
                                            <th style="width:15%;">Nome</th>
                                            <th style="width:15%;">Quantidade máxima</th>
                                            <th style="width:15%;">Preço</th>
                                            <th style="width:15%;">Data Inicio</th>
                                            <th style="width:15%;">Data Fim</th>
                                            <th style="width:15%;">Descrição</th>

                                            {{-- <th style="width:15%;">Ação</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->tickets as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->max_qtd}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->start_date}} | {{$item->start_time}}</td>
                                                <td>{{$item->end_date}} | {{$item->end_time}}</td>
                                                <td>{{$item->description}}</td>
                                                {{-- <td class="table-action">
                                                   
                                                     <a href="{{URL::to('/events/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <a href="{{URL::to('/events/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a> 
                                                </td> --}}
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    </div>
                    </div>
                    <hr>
                    <div class="card">
                    <div class="card-body">
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>LineUps do Evento</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p><strong>Número</strong>: {{$event->lineups->count()}}</p>
                            <div class="table-responsive">
                                <table class="table display">
                                    <thead>
                                        <tr>
                                            <th style="width:10%;">Nome</th>
                                            <th style="width:15%;">Descrição</th>
                                            <th style="width:15%;">Data Inicio</th>
                                            <th style="width:15%;">Data Fim</th>
                                            {{-- <th style="width:15%;">Ação</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->lineups as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->start_date}} | {{$item->start_time}}</td>
                                                <td>{{$item->end_date}} | {{$item->end_time}}</td>
                                                {{-- <td class="table-action">
                                                    
                                                     <a href="{{URL::to('/events/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <a href="{{URL::to('/events/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a> 
                                                </td> --}}
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                   
                </div>
        </div>
    </div>

        
  
    



@endsection