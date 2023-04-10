@extends('layouts.master')
@section('content')

<main id="main" class="site-main">
    <div class="site-content">
        <div class="landing-banner" style="background-image: url('{{asset('images/bg/')}}');">
            <div class="container">
                <div class="lb-info">
                    <h2> Produza eventos e conteúdos digitais na maior plataforma de venda de ingressos.</h2>
                    <p>Soluções completas para promotores de eventos e emprendedores digitais, desde a criação, publicação, gestão, venda e entrega.</p>

                    <div class=" lb-button ">
                        <a href="{{URL::to('/login')}}" class="btn " title="View more ">Criar eventos</a>

                    </div>
                </div>
                <!-- .lb-info -->
            </div>
        </div>
        <!-- .landing-banner -->
        <div class="img-box-inner ">
            <div class="container ">
                <div class="title ld-title ">
                    <h2>Vários formatos um so lugar</h2>
                    <p>From its medieval origins to the digital era.</p>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <div class="img-box-item ">
                            <img src="{{asset('template2/images/icons/pelican1.jpg')}} " alt=" ">
                            <h3>Crie</h3>
                            <p>Em minutos voce cria seu evento e cadastra os seus ingressos para vender</p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="img-box-item ">
                            <img src="{{asset('template2/images/icons/island1.jpg')}} " alt=" ">
                            <h3>Publique</h3>
                            <p>Depois de criado, seu evento ja esta com vendas liberadas pelo nosso site e aplicativo.</p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="img-box-item ">
                            <img src="{{asset('template2/images/icons/surf.jpg')}} " alt=" ">
                            <h3>Venda</h3>
                            <p>Divulgue, acompanhe as vendas em tempo real.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- .img-box-inner -->
        <div class="features-inner ">

            <div class="container ">
                <div class="title ld-title ">
                    <h2>COMO CRIAR SEU EVENTO</h2>
                    <p>Lorem ipsum is placeholder text commonly used in the graphic.</p>
                </div>
                <!-- .title -->
                <div class="features-item ">
                    <div class="features-thumb ">
                        <img src="{{asset('template2/images/Screen Shot 2023-03-07 at 17.13.55.png')}}" alt="Trending Ui/Ux Design ">
                    </div>
                    <div class="features-info ">
                        <h3>Crie <br> <span>O Seu</span> Evento</h3>
                        <p>Em menos de 5 minutos, você cadastra todas as informações do seu evento, como data horário e local. Cria os tipos de bilhete que irá vender e personaliza uma página exclusiva para o seu evento.</p>
                        <a href="# " class="more " title="Read more ">Read more</a>
                    </div>
                </div>
                <!-- .features-item -->
                <div class="features-item ">
                    <div class="features-thumb ">
                        <img src="{{asset('template2/images/ee.png')}} " alt="Bringing it all together ">
                    </div>
                    <div class="features-info ">
                        <h3>Divulgue a <br> sua <span>Pagina</span></h3>
                        <p>Depois de criado, a sua página já está no ar e o seu evento publicado no nosso site e também no app. Pronto, todo mundo já pode acessar a página do seu evento para comprar ou fazer inscrições!. </p>
                        <a href="# " class="more " title="Read more ">Read more</a>
                    </div>
                </div>
                <!-- .features-item -->
                <div class="features-item ">
                    <div class="features-thumb ">
                        <img src="{{asset('template2/images/rr.png')}} " alt="Keep your audience update ">
                    </div>
                    <div class="features-info ">
                        <h3>Acompanhe e<br> <span>gerencie </span> suas vendas</h3>
                        <p>Agora é só acompanhar o andamento das suas vendas, gerenciar os compradores, reenviar ingressos se necessário, e até mesmo emitir cortesias para seus convidados ou patrocinadores. </p>
                        <a href="# " class="more " title="Read more ">Read more</a>
                    </div>
                </div>
                <!-- .features-item -->
                <div class="features-item ">
                    <div class="features-thumb ">
                        <img src="{{asset('template2/images/rr.png')}} " alt="Bringing it all together ">
                    </div>
                    <div class="features-info ">
                        <h3>Controle a entrada <br> dos <span>compradores</span></h3>
                        <p>No dia do seu evento, você tem a sua disposição uma relação com todos os compradores do seu evento para poder fazer o controle de conferência dos bilhete. E ainda pode baixar o nosso app para Organizadores e fazer a leitura
                            dos ingressos direto pela câmera do seu celular!</p>
                        <a href="# " class="more " title="Read more ">Read more</a>
                    </div>
                </div>
                <!-- .features-item -->
                <div class="features-item ">
                    <div class="features-thumb ">
                        <img src="{{asset('template2/images/rr.png')}} " alt="Keep your audience update ">
                    </div>
                    <div class="features-info ">
                        <h3>Receba o dinheiro <br> <span>das </span> suas vendas</h3>
                        <p>Agora é só acompanhar o andamento das suas vendas, gerenciar os compradores, reenviar ingressos se necessário, e até mesmo emitir cortesias para seus convidados ou patrocinadores. </p>
                        <a href="# " class="more " title="Read more ">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- .features -->

    </div>
    <!-- .landing-banner -->
</div>
<!-- .site-content -->
<main id="main" class="site-main">
<div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-checkout.png')}});">
    <div class="container">
        <div class="page-title__content">
            <h1 class="page-title__name">Tipos de Planos</h1>
        </div>
    </div>
</div>
<!-- .page-title -->
<div class="site-content">
    <div class="pricing-area">
        <div class="container">
            <h2 class="title align-center">Controle quem vai no evento, crie ingressos e inscrições online com segurança!</h2>
            <div class="pricing-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pricing-item">
                            <img src="{{asset('template2/images/illustrations/o-ticket-free.jpeg')}}" alt="Basic">
                            <h3>É de graça!</h3>
                            <div class="price"><span class="currency">%</span>0<span class="time">Por venda</span></div>
                            <a href="#" class="btn" title="Get Started">Iniciar</a>
                            <ul>
                                <li>Crie quantos ingressos e inscrições quiser, solicite dados que deseja aos participantes e controle quem vai no evento utilizando um sistema de eventos grátis e completo!</li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="pricing-item">
                            <img src="{{asset('template2/images/illustrations/o-ticket-paid.jpeg')}}" alt="Basic">
                            <h3>Pago</h3>
                            <div class="price"><span class="currency">%</span>10<span class="time">Por venda</span></div>
                            <a href="#" class="btn" title="Get Started">Iniciar</a>
                            <ul>
                                <li>O melhor sistema de venda de ingressos online! Seu público pode pagar com Mpesa, cartão de crédito, débito e Paypal. Veja como é fácil vender ingressos online!</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .pricing-inner -->
            <div class="payment-method">
                <ul>
                    <li><img src="{{asset('template2/images/assets/paypal.png')}}" alt="Paypal"></li>
                    <li><img src="{{asset('template2/images/assets/stripe.png')}}" alt="Stripe"></li>
                    <li><img src="{{asset('template2/images/assets/skrill.png')}}" alt="Skrill"></li>
                    <li><img src="{{asset('template2/images/assets/master-card.png')}}" alt="Master-card"></li>
                </ul>
                <p>Metodos de pagamentos que aceitamos</p>
            </div>
            <!-- .payment-method -->
        </div>
    </div>
    <!-- .pricing-area -->
    <div class="frequently-asked">
        <div class="container">
            <div class="title">
                <h2>Perguntas frequentes do promotor</h2>
                <p>Tem alguma duvida? talves encontre aqui a resposta.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="asked-item">
                        <h3>Como vou receber o valor dos ingressos?</h3>
                        <p>Você pode escolher entre ir recebendo os valores da venda de ingressos enquanto elas estão acontecendo, diretamente na sua conta Mpesa, ou pode optar por receber o valor das inscrições online em uma conta bancária de sua
                            escolha em até 3 dias úteis após a realização do seu evento.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="asked-item">
                        <h3>E seguro usar o Mticket</h3>
                        <p>Sim, pode confiar. Seus dados individuais nunca serão repassados a nenhuma outra entidade sem a sua permissão. Além disso, todas as informações são armazenadas em um banco de dados 100% protegido e os dados de seu cartão
                            de crédito são automaticamente inutilizados.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="asked-item">
                        <h3>Posso fazer eventos de graça?</h3>
                        <p>Sim. para o plano gratis o Mticket não cobra nada, desde que os eventos sejam sem custos.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="asked-item">
                        <h3>Irei conseguir ver em tempo real as vendas?</h3>
                        <p>Sim. voce pode acompanhar as vendas dos ingressos em tempo real. ter o controle do seu evento nas suas mãos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .frequently-asked -->
</div>
<!-- .site-content -->
<div class="landing-banner " style="background-image: url( '{{asset('template2/images/bg/bg-app-222.jpg')}}'); ">
    <div class="container ">
        <div class="lb-info ">
            <h2>Download App</h2>
            <p>Baixa o aplicativo Mticket.</p>
            <div class="lb-button ">

                <a href="# " title="Google play "><img src="{{asset('template2/images/google-play.png')}} " alt="Google play "></a>
            </div>
        </div>
        <!-- .lb-info -->
    </div>
</main>

@endsection