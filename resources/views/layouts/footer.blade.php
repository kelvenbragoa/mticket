 <!-- .site-main -->

 <footer id="footer" class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer__top__info">
                        <h1 class="logo"><a href="/">Mticket</a></h1>
                        <p class="footer__top__info__desc">Descubra coisas incríveis para fazer onde quer que vá.</p>
                        <div class="footer__top__info__app">
                            <a title="App Store" href="#" class="banner-apps__download__iphone"><img src="{{asset('template2/images/assets/app-store.png')}}" alt="App Store"></a>
                            <a title="Google Play" href="#" class="banner-apps__download__android"><img src="{{asset('template2/images/assets/google-play.png')}}" alt="Google Play"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <aside class="footer__top__nav">
                        <h3>Mticket</h3>
                        <ul>
                            <li><a title="About Us" href="{{URL::to('/acerca-nos')}}">Sobre nós</a></li>
                            <li><a title="Blog" href="{{URL::to('/faqs')}}">Perguntas frequentes</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2">
                    <aside class="footer__top__nav">
                        <h3>Suporte</h3>
                        <ul>
                            <li><a title="Get in Touch" href="{{URL::to('/contactos')}}">Entre em contacto</a></li>
                            <li><a title="Help Center" href="{{URL::to('/faqs')}}">Duvidas frequentes</a></li>

                            {{-- <li><a title="How it works" href="#">Como Funciona</a></li> --}}
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3">
                    <aside class="footer__top__nav footer__top__nav--contact">
                        <h3>Contacte nós</h3>
                        <p>Email: support@mticket.co.mz</p>
                        <p>Phone: +258 84 0000</p>
                        <ul>
                            <li class="facebook">
                                <a title="Facebook" href="#">
                                    <i class="la la-facebook-f"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a title="Twitter" href="#">
                                    <i class="la la-twitter"></i>
                                </a>
                            </li>
                            <li class="youtube">
                                <a title="Youtube" href="#">
                                    <i class="la la-youtube"></i>
                                </a>
                            </li>
                            <li class="instagram">
                                <a title="Instagram" href="#">
                                    <i class="la la-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
        <!-- .top-footer -->
        <div class="footer__bottom">
            <p class="footer__bottom__copyright">{{date('Y')}} &copy; <a title="Uxper Team" href="#">connectUS.co.mz</a>. All rights reserved.</p>
        </div>
        <!-- .top-footer -->
    </div>
    <!-- .container -->
</footer>
<!-- site-footer -->
</div>
<!-- #wrapper -->
</body>

</html>
</body>

</html>

<script src="{{asset('template2/js/map-single.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvPDNG6pePr9iFpeRKaOlaZF_l0oT3lWk&callback=initMap" async defer></script>