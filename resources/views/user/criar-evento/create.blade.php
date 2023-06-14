@extends('layouts.master')
@section('content')

<main id="main" class="site-main listing-main">
    <div class="listing-nav">
        <div class="listing-menu nav-scroll">
            <ul>
                <li class="active"><a href="#genaral" title="Genaral"><span class="icon"><i class="la la-cog"></i></span><span>Geral</span></a></li>
                <li><a href="#location" title="Location"><span class="icon"><i class="la la-map-marker"></i></span><span>Localização</span></a></li>
                <li><a href="#contact" title="Contact info"><span class="icon"><i class="la la-phone"></i></span><span>Contactos</span></a></li>
                <li><a href="#social" title="Social network"><span class="icon"><i class="la la-link"></i></span><span>Redes Sociais</span></a></li>
                <li><a href="#media" title="Media"><span class="icon"><i class="la la-image"></i></span><span>Media</span></a></li>
            </ul>
        </div>
    </div>
    <!-- .listing-nav -->
    <div class="listing-content">
        <h2>Criar Evento</h2>
        <form class="upload-form" method="POST" action="{{route('eventos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="listing-box" id="genaral">
                <h3>Geral</h3>
                <div class="field-group field-select">
                    <label for="lis_category">Nome do Evento</label>
                    <input type="text" id="name" placeholder="Nome do evento" name="name" required>
                   
                </div>
                <div class="field-inline">
                    <div class="field-group field-select">
                        <label for="price_range">Província</label>
                        <select name="province_id" id="province_id" required>
                            <option value="">Selecionar</option>
                            @foreach ( \App\Models\Province::get() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>
                    <div class="field-group field-select">
                        <label for="price_range">Cidade</label>
                        <select name="city_id" id="city_id" required>
                            <option value="">Selecionar</option>
                            @foreach ( \App\Models\City::get() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>
                </div>
                <div class="field-group">
                    <h4 class="label">Descrição do evento</h4>
                    <textarea type="text" id="description" class="form-control" placeholder="Descrição do Evento" name="description" rows="5" required></textarea>
                </div>
                <div class="field-group field-select">
                    <label for="lis_category">Categoria principal</label>
                    <select name="main_category_id" id="main_category_id" required>
                        <option value="">Selecionar</option>
                        @foreach ( \App\Models\Category::get() as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <i class="la la-angle-down"></i>
                </div>
                <div class="field-group field-select">
                    <label for="lis_place_type">Categoria Secundária</label>
                    <select name="second_category_id" id="second_category_id" required>
                        <option value="">Selecionar</option>
                        @foreach ( \App\Models\Category::get() as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <i class="la la-angle-down"></i>
                </div>
            </div>
           

            <div class="listing-box" id="location">
                <h3>Localização e Data</h3>
                <div class="field-group">
                    <label for="address">Endereço do Evento</label>
                    <input type="text" id="address" placeholder="Endereço completo do evento" name="address" required>
                </div>
                <div class="field-inline">
                    <div class="field-group field-select">
                        <label for="price_range">Data de inicio</label>
                        <input type="date" id="start_date" placeholder="Full Address" name="start_date" required>
                    </div>
                    <div class="field-group field-select">
                        <label for="price_range">Hora de inicio</label>
                        <input type="time" id="start_time" placeholder="Full Address" name="start_time" required>
                    </div>
                </div>

                <div class="field-inline">
                    <div class="field-group field-select">
                        <label for="price_range">Data de termino</label>
                        <input type="date" id="end_date" placeholder="Full Address" name="end_date" required>
                    </div>
                    <div class="field-group field-select">
                        <label for="price_range">Hora de termino</label>
                        <input type="time" id="end_time" placeholder="Full Address" name="end_time" required>
                    </div>
                </div>
                
            </div>
            <!-- .listing-box -->
            <div class="listing-box" id="contact">
                <h3>Contactos para informações</h3>
                <div class="field-group">
                    <label for="place_email">Email</label>
                    <input type="email" id="email" placeholder="Your email address" name="email" required>
                </div>
                <div class="field-group">
                    <label for="place_number">Telefone (opcional)</label>
                    <input type="tel" id="phone" placeholder="Your phone number" name="phone">
                </div>
                <div class="field-group">
                    <label for="place_website">Website (opcional)</label>
                    <input type="text" id="website" placeholder="Your website url" name="website">
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
                                <input type="text" placeholder="Instagram"  name="instagram">
                            </div>
                        </div>
                    </div>
                    <div class="field-clone">
                        <div class="field-inline field-3col">
                           
                            <div class="field-group field-input">
                                <input type="text" placeholder="Facebook"  name="facebook">
                            </div>
                        </div>
                    </div>
                    <div class="field-clone">
                        <div class="field-inline field-3col">
                           
                            <div class="field-group field-input">
                                <input type="text" placeholder="Twitter"  name="twitter">
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
                        <input type="file" id="cover_img" name="image" class="upload-file" data-max-size="1000000">
                        <img class="img_preview" src="images/no-image.png" alt="" />
                        <i class="la la-cloud-upload-alt"></i>
                    </label>
                    <div class="field-note">Tamanho Máximo: 1 MB. A imagem deve ser Quadrada 1000px x 1000px</div>
                </div>
                
                <div class="field-group">
                    <label for="place_video">Video Youtube (optional)</label>
                    <input type="text" id="place_video" placeholder="Youtube video url" name="youtube">
                </div>
            </div>
            <!-- .listing-box -->
            <div class="field-group field-submit">
                <input type="submit" name="submit" value="Submeter" class="btn">
            </div>
        </form>
    </div>
    <!-- .listing-content -->
</main>
@endsection