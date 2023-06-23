@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    
    <div class="site-content owner-content">
        <div class="member-menu">
            <div class="container">
                <ul>
                    @if (Auth::user()->is_promotor == 1)
                        <li><a href="{{route('painel.index')}}">Dashboard</a></li>
                        <li>
                            <a href="{{route('vendas.index')}}">Receita</a>
                        </li>
                        <li>
                            <a href="{{route('bar.index')}}">Bar</a>
                        </li>
                        <li><a href="{{route('eventos.index')}}">Meus Eventos</a></li>
                    @endif
                    
                    
                    <li class="active"><a href="{{URL::to('/perfil')}}">Perfil</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            @if (Session::has('message'))
                <div class="alert alert-success" style="background-color: rgb(102, 187, 102)">
                    <ul>
                        <li>{{Session::get('message')}}</li>
                    </ul>
                    
                </div>
            @endif
        
            @if (Session::has('messageError'))
                <div class="alert alert-success" style="background-color: red ">
                    <ul>
                        <li>{{Session::get('messageError')}}</li>
                    </ul>
                    
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="member-wrap">
                <div class="member-wrap-top">
                    <h2>Definições Perfil</h2>
                    <p><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a></p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <p><img  width="250" class="rounded-circle" height="250" src="/storage/{{Auth::user()->image ?? 'profile/default.jpg'}}" alt="profile_pic"></p>
                </div>
                <!-- .member-wrap-top -->

                    <form action="{{ route('profile.update', Auth::user()->id)}}" method="POST" class="member-profile form-underline" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    <h3>Avatar</h3>
                    <div class="member-avatar">
                        <img id="member_avatar" src="{{asset('template/images/member-avatar.png')}}" alt="Member Avatar">
                        <label for="upload_new">
                            <input id="upload_new" type="file" name="image" placeholder="Upload new" value="">
                            Carregar nova
                        </label>
                    </div>
                    <h3>Informações Básicas</h3>
                    <div class="field-input">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" id="email" value="{{Auth::user()->email}}" readonly>
                    </div>
                    <div class="field-input">
                        <label for="name">Nome</label>
                        <input type="text" name="name" placeholder="Nome" id="name" value="{{Auth::user()->name}}" required>
                    </div>
                    
                    <div class="field-input">
                        <label for="phone">Telefone</label>
                        <input type="tel" name="mobile" placeholder="Telefone" id="mobile" value="{{Auth::user()->mobile}}" required>
                    </div>
                    <div class="field-input">
                        <label for="facebook">Endereço</label>
                        <input type="text" name="address" placeholder="Endereço" value="{{Auth::user()->address}}">
                    </div>
                    <div class="field-group field-select">
                        <label for="instagram">Província</label>
                        <select type="text" name="province_id" placeholder="Provícnia" id="province_id" required>
                            @foreach (\App\Models\Province::orderBy('name','asc')->get() as $item)
                                <option value="{{$item->id}}" @if (Auth::user()->province_id == $item->id ) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field-group field-select">
                        <label for="instagram">Cidade</label>
                        <select type="text" name="city_id" placeholder="Cidade" id="city_id" required>
                            @foreach (\App\Models\City::orderBy('name','asc')->get() as $item)
                                <option value="{{$item->id}}" @if (Auth::user()->city_id == $item->id ) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field-group field-select">
                        <label for="instagram">Sexo</label>
                        <select type="text" name="gender_id" placeholder="Cidade" id="gender_id" required>
                            @foreach (\App\Models\Gender::orderBy('name','asc')->get() as $item)
                                <option value="{{$item->id}}" @if (Auth::user()->gender_id == $item->id ) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                   @if (Auth::user()->is_promotor == 1)
                   <div class="field-input">
                    <label for="phone">Nome da Empresa promotora de Evento</label>
                    <input type="text" name="company_name"placeholder="Empresa promotora de Evento" id="company_name" value="{{Auth::user()->company_name}}">
                </div>
                <div class="field-input">
                    <label for="facebook">Endereço da Empresa promotora de Evento</label>
                    <input type="text" name="company_location" placeholder="Endereço da Empresa promotora de Evento" value="{{Auth::user()->company_location}}">
                </div>

                <div class="field-input">
                    <label for="facebook">BI nº</label>
                    <input type="text" name="bi" placeholder="Endereço da Empresa promotora de Evento" value="{{Auth::user()->bi}}">
                </div>
                <div class="field-input">
                    <label for="facebook">Bio</label>
                    <textarea type="text" name="description" placeholder="Descrição da empresa" rows="2">{{Auth::user()->description}}</textarea>
                </div>
                @endif
                <div class="field-submit">
                    <input type="submit" value="Atualizar">
                </div>
                   
                </form>
                <!-- .member-profile -->
                <form method="POST" action="{{URL::to('/changepassword')}}" class="member-password form-underline">
                    @csrf
            
                    <h3>Mudar a Password</h3>
                    <div class="field-input">
                        <label for="old_password">Antiga password</label>
                        <input type="password" name="current_password" placeholder="Password Antiga" id="current_password">
                    </div>
                    <div class="field-input">
                        <label for="new_password">Nova password</label>
                        <input type="password" name="new_password" placeholder="Nova password" id="new_password">
                    </div>
                    <div class="field-input">
                        <label for="re_new">Re-introduzir nova password</label>
                        <input type="password" name="new_confirm_password" placeholder="Repetir nova password" id="new_confirm_password">
                    </div>
                    <div class="field-submit">
                        <input type="submit" value="Guardar">
                    </div>
                </form>
                <!-- .member-password -->
            </div>
            <!-- .member-wrap -->
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->


  
@endsection