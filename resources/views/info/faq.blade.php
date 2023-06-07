@extends('layouts.master')
@section('content')



<main id="main" class="site-main">
    <div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-404.png);">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name">FAQ's</h1>
                <p class="page-title__slogan">Perguntas frequentes</p>
            </div>
        </div>
    </div>
    <!-- .page-title -->
    <div class="site-content">
        <div class="container">
            <h2 class="title align-center">Como podemos ser úteis?</h2>
            <ul class="accordion first-open">
                <li>
                    <h3 class="accordion-title"><a href="#">Sou menor de idade e quero comprar ingresso. Tem algum problema?</a></h3>
                    <div class="accordion-content">
                        <p>Antes de tudo, verifique a censura do evento na tela de compra dos ingressos. Se for censura livre, não tem problema, pode comprar.</p>
                    </div>
                </li>
                <li>
                    <h3 class="accordion-title"><a href="#">Finalizei meu pedido, e agora? Como vou receber meu ingresso?</a></h3>
                    <div class="accordion-content">
                        <p>Tudo depende da forma de pagamento, O ticket já irá aparecer na tela do seu computador. É só imprimir. Para maior segurança, o mesmo ticket será enviado para o seu e-mail utilizado na compra.
                        </p>
                    </div>
                </li>
                <li>
                    <h3 class="accordion-title"><a href="#"> Quantos ingressos eu posso comprar?</a></h3>
                    <div class="accordion-content">
                        <p>A quantidade é definida pelo organizador do evento, e para conferir quantos ingressos cada pessoa pode comprar, vá até a tela do evento e selecione a quantidade desejada.

                        </p>
                    </div>
                </li>
                <li>
                    <h3 class="accordion-title"><a href="#">Cancelaram o evento, como recebo o valor do ingresso?</a></h3>
                    <div class="accordion-content">
                        <p>O primeiro passo é denunciar o cancelamento do evento clicando aqui. Preencha os campos solicitados e clique em enviar. A equipe de atendimento do Mticket entrará em contato informando as próximas etapas para ressarcimento
                            do valor.</p>
                    </div>
                </li>
                <li>
                    <h3 class="accordion-title"><a href="#">É seguro comprar via Mticket?</a></h3>
                    <div class="accordion-content">
                        <p>Sim, pode confiar. Seus dados individuais nunca serão repassados a nenhuma outra entidade sem a sua permissão. Além disso, todas as informações são armazenadas em um banco de dados 100% protegido e os dados de seu cartão
                            de crédito são automaticamente inutilizados após a confirmação de compra.</p>
                    </div>
                </li>
                <li>
                    <li>
                        <h3 class="accordion-title"><a href="#"> Tenho que me cadastrar em algum sistema de pagamento para comprar meus ingressos?</a></h3>
                        <div class="accordion-content">
                            <p>Não. A tecnologia Mticket é 100% independente e segura, pode confiar!</p>
                        </div>
                    </li>
                    <h3 class="accordion-title"><a href="#">Como receberei meu ingresso?</a></h3>
                    <div class="accordion-content">
                        <p>Após a confirmação do pagamento você receberá um e-mail com seu ticket para impressão ou para salvar. Os ingressos Mticket são eletrônicos, o que permite mantê-lo em seu celular e evitar assim desperdício de papel e logística
                            de entrega física.
                        </p>

                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- .site-content -->
</main>
<!-- .site-main -->

@endsection