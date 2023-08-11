<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{asset('template2/images/ttttt.png')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTicket</title>
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template_login/css/iofrm-theme17.css')}}">
</head>
<body>
    <div class="form-body without-side">
        
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
                       
                        <h1>
                            <a style="
                            text-align:center;
                            border: 0;
                            font-size: 100%;
                            margin: 0;
                            outline: 0;
                            padding: 0;
                            vertical-align: baseline;
                            color: #0097ff;
                            text-decoration: none;
                            transition: all 0.3s ease-in-out 0s;
                            -moz-transition: all 0.3s ease-in-out 0s;
                            -o-transition: all 0.3s ease-in-out 0s;
                            -webkit-transition: all 0.3s ease-in-out 0s;
                            -ms-transition: all 0.3s ease-in-out 0s;"
                            
                            href="{{URL::to('/')}}"> MTICKET </a></h1>
                       
                        <h3>Entre com sua conta</h3>
                        <p>Acesse a todos o eventos em uma só plataforma..</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Endereço E-mail / Telefone" value="{{ old('email') }}" required autocomplete="email" autofocus>
                           
                            @error('email')
                                <small style="color:red">
                                    <strong>{{ $message }}</strong>
                                </small> 
                            @enderror

                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                                <small style="color:red">
                                    <strong>{{ $message }}</strong>
                                </small> 
                                @enderror

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Entrar</button> <a href="{{ route('password.request') }}">Esqueceu password?</a>
                            </div>
                        </form>
                        {{-- <div class="other-links">
                            <div class="text">Or login with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div> --}}
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