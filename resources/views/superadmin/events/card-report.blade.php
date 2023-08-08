@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Relatorio da Cartões</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Relatório de Cartões </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">


                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Cartões registrados</h5>
                                                <h1 class="mt-1 mb-3">{{$card->count()}}</h1>
                                                
                                            </div>
                                        </div>
                                    </div>





                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Total recargas</h5>
                                                <h1 class="mt-1 mb-3">{{$topup->sum('total')}} MT</h1>
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
    </div>

</div>

@endsection