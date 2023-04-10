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
                    <img src="{{asset('template_login/images/graphic3.svg')}}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Registrar nova conta</h3>
                        <p>Acesse a todos o eventos em uma só plataforma.</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input class="form-control" type="text" name="name" placeholder="Nome Completo" value="{{old('name')}}" required>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input class="form-control" type="email" name="email" placeholder="Endereço E-mail" value="{{old('email')}}" required>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input class="form-control" type="text" name="mobile" placeholder="Telefone" value="{{old('mobile')}}" required>
                            @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Repita Password" required>
                           
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Registrar</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Ou registrar com</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a href="{{URL::to('/login')}}">Entrar com conta</a>
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