@extends('layouts.master')
@section('content')

<main id="main" class="site-main listing-main">
    <div class="listing-nav">
        <div class="listing-menu nav-scroll">
            <ul>
                <li class="active"><a href="#genaral" title="Genaral"><span class="icon"><i class="la la-cog"></i></span><span>Geral</span></a></li>
                <li class="active"><a href="#horario" title="Horario"><span class="icon"><i class="la la-cog"></i></span><span>Horário</span></a></li>
                <li class="active"><a href="#quantidade" title="Quantidade"><span class="icon"><i class="la la-cog"></i></span><span>Quantidade</span></a></li>
            </ul>
        </div>
    </div>
    
    <!-- .listing-nav -->
    <div class="listing-content">
       

        
        <h2>Convite - {{$invites->name}} - {{$event->name}}</h2>
        <a href="{{URL::to('/convites/'.$event->id.'/evento')}}" title="General"><span class="icon"><i class="la la-angle-left"></i></span><span>Voltar</span></a>
        <form class="upload-form" method="POST" action="{{ route('customerinvite.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="listing-box" id="genaral">
                @if (Session::has('message'))
                    <div class="alert alert-success" style="background-color: rgb(143, 228, 143)">
                        {{Session::get('message')}}
                    </div>
                @endif
                <h3>Convite</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome Cliente</label>                   
                </div>
                <input type="text" id="name" placeholder="Nome do Cliente" name="name">
                <input type="hidden" id="name" placeholder="Nome do Cliente" name="event_id" value="{{$event->id}}">
                <input type="hidden" id="name" placeholder="Nome do Cliente" name="invite_id" value="{{$invites->id}}">

            
                
            </div>
       
            <div class="field-group field-submit">
                <input type="submit" value="Submeter" class="btn">
            </div>
        </form>
        <hr>
        <table class="member-place-list table-responsive">
            <thead>
                <tr>
                   
                    
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customerinvites as $item)
                    <tr>
                    
                        <td data-title="Nome">{{$item->name}}</td>
                        <td data-title="Descrição">{{$invites->name}}</td>
                        <td data-title="" class="place-action">
                            <a href="{{URL::to('/customerinvite/'.$item->id)}}" class="edit" title="Show"><i class="las la-eye"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Nenhum Convite para este evento !</td>
                    </tr>
                @endforelse
                
                
            </tbody>
        </table>
    </div>
    <!-- .listing-content -->
</main>
@endsection