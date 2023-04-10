@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Usuários</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   {{-- <a href="{{route('province.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Usuários</a>--}}

                   
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
                    <table id="myTable" class="table display" >
                        <thead>
                            <tr>
                                <th style="width:40%;">Nome</th>
                                <th style="width:40%;">Email</th>
                                <th style="width:40%;">Telefone</th>
                                <th style="width:80%;">Tipo</th>
                                <th style="width:80%;">Genêro</th>
                                <th style="width:80%;">Província</th>
                                <th style="width:80%;">Cidade</th>
                                <th style="width:30%;">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->name ?? ''}}</td>
                                    <td>{{$item->email ?? ''}}</td>
                                    <td>{{$item->mobile ?? ''}}</td>
                                    <td>{{$item->role->name ?? ''}}</td>
                                    <td>{{$item->gender->name ?? ''}}</td>
                                    <td>{{$item->province->name ?? ''}}</td>
                                    <td>{{$item->city->name ?? ''}}</td>

                                    <td class="table-action">
                                       {{-- <a href="{{URL::to('/user/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>  --}}
                                       
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

@endsection