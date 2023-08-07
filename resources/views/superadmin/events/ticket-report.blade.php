@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Relatorio da Bilheteria</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Relatório de Bilheteria </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Bilhetes Físicos</h5>
                                                <h1 class="mt-1 mb-3">{{$tickets_local->sum('qty')}}</h1>
                                                <h1 class="mt-1 mb-3">{{$tickets_local_amount}} MT</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Bilhetes Online</h5>
                                                <h1 class="mt-1 mb-3">{{$tickets_online->sum('qty')}}</h1>
                                                <h1 class="mt-1 mb-3">{{$tickets_online->sum('total')}} MT</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Convites Online</h5>
                                                <h1 class="mt-1 mb-3">{{$invites_online->sum('qty')}}</h1>
                                                <h1 class="mt-1 mb-3">{{$invites_online->sum('total')}} MT</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Total Fisico e Online</h5>
                                                <h1 class="mt-1 mb-3">{{$tickets_local->sum('qty') + $tickets_online->sum('qty')}}</h1>
                                                <h1 class="mt-1 mb-3">{{$tickets_local->sum('total') + $tickets_online->sum('total')}} MT</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Bilhetes Físicos</h5>
                                                <h5 class="mt-1 mb-3">Validados: {{$tickets_local_true->count()}}</h5>
                                                <h5 class="mt-1 mb-3">Não validados: {{$tickets_local_false->count()}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Bilhetes Online</h5>
                                                <h5 class="mt-1 mb-3">Validados: {{$tickets_online_true->count()}}</h5>
                                                <h5 class="mt-1 mb-3">Não validados: {{$tickets_online_false->count()}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Convites Online</h5>
                                                <h5 class="mt-1 mb-3">Validados: {{$invites_online_true->count()}}</h5>
                                                <h5 class="mt-1 mb-3">Não validados {{$invites_online_false->count()}}</h5>
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