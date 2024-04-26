
@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Relatorio da Protocolo</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Relatório de Protocolo </h5>
                </div>

               
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <p>Nome: {{$protocol->name}}</p>
                                    {{-- <p>Vendas Feitas:{{$sells_made->count()}} . Valor: {{$sells_made->sum('total')}} MT</p> --}}
                                    <p>Vendas Feitas: {{$sells->count()}}.  Valor: {{$sells->sum('total')}} MT</p>

                                    <p>Vendas verificadas</p>
                                    <div class="table-responsive">
                                        <table class="table display" >
                                            <thead>
                                                <tr>
                                                    <th style="width:15%;">ID</th>
                                                    <th style="width:15%;">Venda total</th>
                                                    <th style="width:15%;">Ticket</th>
                                                    <th style="width:15%;">Data</th>
                    
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sells as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->total}} MT</td>
                                                        <td>{{$item->ticket->name}}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        
                                                      
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