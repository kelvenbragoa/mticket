<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTicket</title>
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/iofrm-theme17.css')}}">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="/">
                <div class="logo">
                    <h1 class="logo"><a href="/">MyTicket</a></h1>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Entre com sua conta</h3>
                        <p>Acesse a todos o eventos em uma só plataforma..</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Endereço E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
                           
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Entrar</button> <a href="{{ route('password.request') }}">Esqueceu password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Or login with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a href="{{URL::to('/register')}}">Registrar nova conta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('template_login/js/jquery.min.js')}}"></script>
<script src="{{asset('template_login/js/popper.min.js')}}"></script>
<script src="{{asset('template_login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template_login/js/main.js')}}"></script>
</body>
</html>