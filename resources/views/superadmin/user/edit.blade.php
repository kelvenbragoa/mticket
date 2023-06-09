@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Editar Usuário</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Editar Usuário</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{ route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Nome</label>
                                <input type="text" class="form-control" placeholder="Nome" value="{{$user->name ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Email</label>
                                <input type="text" class="form-control" placeholder="Email" value="{{$user->email ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Telefone</label>
                                <input type="text" class="form-control" placeholder="Telefone" value="{{$user->mobile ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">BI</label>
                                <input type="text" class="form-control" placeholder="BI" value="{{$user->bi ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Endereço</label>
                                <input type="text" class="form-control" placeholder="Endereço" value="{{$user->address ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Sexo</label>
                                <input type="text" class="form-control" placeholder="Sexo" value="{{$user->gender->name ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Provincia</label>
                                <input type="text" class="form-control" placeholder="Provincia" value="{{$user->province->name ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Cidade</label>
                                <input type="text" class="form-control" placeholder="Cidade" value="{{$user->city->name ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Tipo de Usuário</label>
                                <input type="text" class="form-control" placeholder="Tipo de Usuário" value="{{$user->role->name ?? ''}}" required readonly>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Promotor de Evento</label>
                                <select type="text" name="is_promotor" class="form-control" placeholder="Promotor de Evento"  required>
                                    <option value="1" @if ($user->is_promotor == 1) selected @endif>Sim</option>
                                    <option value="0" @if ($user->is_promotor == 0) selected @endif>Não</option>
                                </select>
                            </div>
                            
                        </div>

        
                        <button type="submit" class="btn btn-primary">Submeter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection