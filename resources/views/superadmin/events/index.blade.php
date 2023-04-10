@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Cidades</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('events.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar</a>
                   
                </div>
                
                <div class="card-body">
                    @if (Session::has('messageSuccess'))
                        <div class="alert alert-success">
                            {{Session::get('messageSuccess')}}
                        </div>
                    @endif
                    @if (Session::has('messageError'))
                        <div class="alert alert-danger">
                            {{Session::get('messageError')}}
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table id="myTable" class="table display" >
                        <thead>
                            <tr>
                                <th style="width:15%;">Evento</th>
                                <th style="width:15%;">Inicio</th>
                                <th style="width:15%;">Fim</th>
                                <th style="width:15%;">Usuario</th>
                                <th style="width:15%;">Email</th>
                                <th style="width:15%;">Telefone</th>
                                <th style="width:15%;">Estado</th>
                                <th style="width:15%;">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{date('d-m-Y', strtotime($item->start_date))}}</td>
                                    <td>{{date('d-m-Y', strtotime($item->end_date))}}</td>
                                    <td>{{$item->user->name ?? ''}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>@if ($item->status_id == 1) <span class="badge bg-danger">Cancelado</span> @endif @if($item->status_id == 2) <span class="badge bg-success">Aprovado</span> @endif @if($item->status_id == 3) <span class="badge bg-warning">Pendente</span> @endif</td>
                                    
                                    <td class="table-action">
                                        {{-- <a href="{{URL::to('/events/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a> --}}
                                        <a href="{{URL::to('/events/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                       
                                    </td>
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

@endsection