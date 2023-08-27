
@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Relatorio da Barman</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Relatório de Barman </h5>
                </div>

               
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <p>Nome: {{$barman->name}}</p>
                                    <p>Vendas Feitas:{{$sells_made->count()}} </p>
                                    <p>Vendas verificadas: {{$sells->count()}}</p>

                                    <p>Vendas verificadas</p>
                                    <div class="table-responsive">
                                        <table class="table display" >
                                            <thead>
                                                <tr>
                                                    <th style="width:15%;">ID</th>
                                                    <th style="width:15%;">Venda total</th>
                                                    <th style="width:15%;">Metodo</th>
                    
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sells as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->total}} MT</td>
                                                        <td>{{$item->method}}</td>
                                                        
                                                      
                                                    </tr>
                                                    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <p>Vendas feitas</p>
                                    <div class="table-responsive">
                                        <table class="table display" >
                                            <thead>
                                                <tr>
                                                    <th style="width:15%;">ID</th>
                                                    <th style="width:15%;">Venda total</th>
                                                    <th style="width:15%;">Metodo</th>
                    
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sells_made as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->total}} MT</td>
                                                        <td>{{$item->method}}</td>
                                                        
                                                      
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
        </div>
    </div>

</div>

@endsection