@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    <div class="site-content owner-content">
       
       
    
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li><a href="{{route('painel.index')}}">Dashboard</a></li>
                    <li>
                        <a href="{{route('vendas.index')}}">Receita</a>
                    </li>
                    <li  class="active"><a href="{{route('eventos.index')}}">Meus Eventos</a></li>
                   
                    <li><a href="{{URL::to('home')}}">Perfil</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="member-place-wrap">
                <div class="member-wrap-top">
                    <h2>Editar Evento</h2>
                </div>
                <!-- .member-wrap-top -->
                <div class="listing-box" id="genaral">
                   
                    <h3>Bilhetes para o evento ({{$event->tickets->count()}})</h3>
                    
                    <a href="{{URL::to('/bilhete/'.$event->id.'/evento')}}" class="btn btn-pill btn-warning mb-2"><i class="far fa-plus"></i>Adicionar/Editar Bilhetes</a>
                    <table class="member-place-list table-responsive">
                        <thead>
                            <tr>

                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Max</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($event->tickets as $item)
                                    <tr>
                                    
                                        <td data-title="Nome">{{$item->name}}</td>
                                    
                                        <td data-title="Descrição"><b>{{$item->price}} MT</b></td>

                                        <td data-title="Max"><b>{{$item->max_qtd}}</b></td>
                                    
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="2" align="center">Nenhum Bilhete adicionado</td>
                                </tr>
                                    
                                @endforelse 
                        </tbody>
                    </table>
                </div>
                <div class="listing-box" id="genaral">
                   
                    <h3>LineUps/Momentos para o Evento ({{$event->lineups->count()}})</h3>
                    <a href="{{URL::to('/lineup/'.$event->id.'/evento')}}" class="btn btn-pill btn-warning  mb-2"><i class="far fa-plus"></i>Adicionar/Editar LineUps do Evento</a>
                        
                        <table class="member-place-list table-responsive">
                            <thead>
                                <tr>

                                    <th>Nome</th>
                                    <th>Inicio</th>
                                    <th>Fim</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($event->lineups as $item)
                                <tr>
                                    
                                    <td data-title="Nome">{{$item->name}}</td>
                                    <td data-title="Inicio">{{$item->start_time}}</td>
                                    <td data-title="Fim">{{$item->end_time}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" align="center">Nenhum LineUp adicionado</td>
                                </tr>
                                @endforelse    
                                
                                    
                               
                                
                                
                            </tbody>
                        </table>
                </div>
                
                <form class="upload-form" method="POST" action="{{ route('eventos.update', $event->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="listing-box" id="genaral">
                        <h3>Geral</h3>
                        <div class="field-group field-select">
                            <label for="lis_category">Nome do Evento</label>
                            <input type="text" id="name" placeholder="Nome do evento" name="name" value="{{$event->name}}" required>
                           
                        </div>
                        <div class="field-inline">
                            <div class="field-group field-select">
                                <label for="price_range">Província</label>
                                <select name="province_id" id="province_id" required>
                                    <option value="">Selecionar</option>
                                    @foreach ( \App\Models\Province::get() as $item)
                                        <option value="{{$item->id}}" @if ($event->province_id == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <i class="la la-angle-down"></i>
                            </div>
                            <div class="field-group field-select">
                                <label for="price_range">Cidade</label>
                                <select name="city_id" id="city_id" required>
                                    <option value="">Selecionar</option>
                                    @foreach ( \App\Models\City::get() as $item)
                                        <option value="{{$item->id}}" @if ($event->city_id == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <i class="la la-angle-down"></i>
                            </div>
                        </div>
                        <div class="field-group">
                            <h4 class="label">Descrição do evento</h4>
                            <textarea type="text" id="description" class="form-control" placeholder="Descrição do Evento" name="description" rows="5" required>{{$event->description}}</textarea>
                        </div>
                        <div class="field-group field-select">
                            <label for="lis_category">Categoria principal</label>
                            <select name="main_category_id" id="main_category_id" required>
                                <option value="">Selecionar</option>
                                @foreach ( \App\Models\Category::get() as $item)
                                    <option value="{{$item->id}}" @if ($event->main_category_id == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <i class="la la-angle-down"></i>
                        </div>
                        <div class="field-group field-select">
                            <label for="lis_place_type">Categoria Secundária</label>
                            <select name="second_category_id" id="second_category_id" required >
                                <option value="">Selecionar</option>
                                @foreach ( \App\Models\Category::get() as $item)
                                    <option value="{{$item->id}}" @if ($event->second_category_id == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <i class="la la-angle-down"></i>
                        </div>
                    </div>

                  
                   
        
                    <div class="listing-box" id="location">
                        <h3>Localização e Data</h3>
                        <div class="field-group">
                            <label for="address">Endereço do Evento</label>
                            <input type="text" id="address" placeholder="Endereço completo do evento" name="address" value="{{$event->address}}" required>
                        </div>
                        <div class="field-inline">
                            <div class="field-group field-select">
                                <label for="price_range">Data de inicio</label>
                                <input type="date" id="start_date" placeholder="Data Inicio" name="start_date" value="{{$event->start_date}}" required>
                            </div>
                            <div class="field-group field-select">
                                <label for="price_range">Hora de inicio</label>
                                <input type="time" id="start_time" placeholder="Hora Inicio" name="start_time" value="{{$event->start_time}}" required>
                            </div>
                        </div>
        
                        <div class="field-inline">
                            <div class="field-group field-select">
                                <label for="price_range">Data de termino</label>
                                <input type="date" id="end_date" placeholder="Data de termino" name="end_date" value="{{$event->end_date}}" required>
                            </div>
                            <div class="field-group field-select">
                                <label for="price_range">Hora de termino</label>
                                <input type="time" id="end_time" placeholder="Hora de termino" name="end_time" value="{{$event->end_time}}" required>
                            </div>
                        </div>
                        
                    </div>
                    <!-- .listing-box -->
                    <div class="listing-box" id="contact">
                        <h3>Contactos para informações</h3>
                        <div class="field-group">
                            <label for="place_email">Email</label>
                            <input type="email" id="email" placeholder="Email" name="email" value="{{$event->email}}" required>
                        </div>
                        <div class="field-group">
                            <label for="place_number">Telefone (opcional)</label>
                            <input type="tel" id="phone" placeholder="Telefone" name="phone" value="{{$event->phone}}">
                        </div>
                        <div class="field-group">
                            <label for="place_website">Website (opcional)</label>
                            <input type="url" id="website" placeholder="website" name="website" value="{{$event->instagram}}">
                        </div>
                    </div>
                    <!-- .listing-box -->
                    <div class="listing-box" id="social">
                        <h3>Redes Sociais</h3>
                        <div class="field-group">
                            <label for="place_socials">Adicionar Redes Sociais (Opcional)</label>
                            <div class="field-clone">
                                <div class="field-inline field-3col">
                                   
                                    <div class="field-group field-input">
                                        <input type="text" placeholder="Instagram"  name="instagram" value="{{$event->instagram}}">
                                    </div>
                                </div>
                            </div>
                            <div class="field-clone">
                                <div class="field-inline field-3col">
                                   
                                    <div class="field-group field-input">
                                        <input type="text" placeholder="Facebook"  name="facebook" value="{{$event->facebook}}">
                                    </div>
                                </div>
                            </div>
                            <div class="field-clone">
                                <div class="field-inline field-3col">
                                   
                                    <div class="field-group field-input">
                                        <input type="text" placeholder="Twitter"  name="twitter" value="{{$event->twitter}}">
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                  
                    <div class="listing-box" id="media">
                        <h3>Imagem capa do Evento</h3>
                        <div class="field-group field-file">
                            <label for="cover_img">Imagem capa do evento</label>
                            <label for="cover_img" class="preview">
                                <input type="file" id="cover_img" name="image" class="upload-file2" data-max-size="1000000">
                                <img class="img_preview" src="/storage/{{$event->image}}" alt="" />
                                <i class="la la-cloud-upload-alt"></i>
                            </label>
                            <div class="field-note">Tamanho Máximo: 1 MB.</div>
                        </div>
                        
                        <div class="field-group">
                            <label for="place_video">Video Youtube (optional)</label>
                            <input type="url" id="place_video" placeholder="Youtube video url" name="youtube" value="{{$event->youtube}}">
                        </div>
                    </div>
                    <!-- .listing-box -->
                    <div class="field-group field-submit">
                        <input type="submit" value="Editar" class="btn">
                    </div>
                </form>
                
                
               
                <!-- .pagination -->
            </div>
            <!-- .member-place-wrap -->
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->


  
@endsection