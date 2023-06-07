@extends('layouts.master')
@section('content')


<main id="main" class="site-main contact-main">
    <div class="page-title page-title--small align-left" style="background-image: url({{asset('template2/images/bg/bg-about.png')}});">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name">Contate-nos</h1>
                <p class="page-title__slogan">Nós queremos ouvir de você.</p>
            </div>
        </div>
    </div>
    <!-- .page-title -->
    <div class="site-content site-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-text">
                        <h2>Nossos escritórios</h2>
                        <div class="contact-box">
                            <h3>Maputo</h3>
                            <p>Cidade de Maputo</p>
                            <p>+258 840000</p>
                            <a title="Get Direction">Direções</a>
                        </div>
                        <div class="contact-box">
                            <h3>Beira</h3>
                            <p>Cidade de Beira</p>
                            <p>+258 840000</p>
                            <a title="Get Direction">Direções</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <h2>Entre em contato conosco</h2>
                        <form action="#" method="POST" class="form-underline">
                            <div class="field-inline">
                                <div class="field-input">
                                    <input type="text" name="first_name" value="" placeholder="Primeiro Nome">
                                </div>
                                <div class="field-input">
                                    <input type="text" name="last_name" value="" placeholder="Ultimo Nome">
                                </div>
                            </div>
                            <div class="field-input">
                                <input type="email" name="email" value="" placeholder="Email">
                            </div>
                            <div class="field-input">
                                <input type="tel" name="tel" value="" placeholder="Número de telefone">
                            </div>
                            <div class="field-textarea">
                                <textarea name="message" placeholder="Menssagem"></textarea>
                            </div>
                            <div class="field-submit">
                                <input type="submit" value="Enviar Menssagem" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->

@endsection