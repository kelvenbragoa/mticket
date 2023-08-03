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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="form-body without-side">
       
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
                        <h3>Registrar nova conta</h3>
                        <p>Acesse a todos o eventos em uma só plataforma.</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input class="form-control" type="text" name="name" placeholder="Nome Completo" value="{{old('name')}}" required>
                            @error('name')
                                <small style="color:red">
                                    <strong>{{ $message }}</strong>
                                </small> 
                            @enderror
                            <input class="form-control" type="email" name="email" placeholder="Endereço E-mail" value="{{old('email')}}" required>
                            @error('email')
                                <small style="color:red">
                                    <strong>{{ $message }}</strong>
                                </small> 
                            @enderror
                            <input class="form-control" type="text" name="mobile" placeholder="Telefone" value="{{old('mobile')}}" required>
                            @error('mobile')
                                <small style="color:red">
                                    <strong>{{ $message }}</strong>
                                </small> 
                            @enderror
                            <input class="form-control" type="password" name="password" placeholder="Password (8 ou mais caracteres)" required>
                            
                            @error('password')
                                <small style="color:red">
                                    <strong>{{ $message }}</strong>
                                </small>  
                            @enderror
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Repita Password" required>

                            <label>Qual tipo de usuário deseja ser?</label>
                            
                            
                            <div class="inline-el-holder">
                                <div class="inline-el">
                                    <div class="rad-with-details">
                                        <input type="radio" id="rad3" name="is_promotor" value="0" checked><label for="rad3" required>Usuário Normal</label>
                                        
                                    </div>
                                </div>

                                <div class="inline-el">
                                    <div class="rad-with-details">
                                        <input type="radio" id="rad2" name="is_promotor" value="1"><label for="rad2" required>Promotor de Eventos</label>
                                        
                                    </div>
                                </div>
                                
                            </div>

                            <label for="rad1">Aceita os termos e codições?</label>
                            
                            
                            <div class="inline-el-holder">
                                <div class="inline-el">
                                    <div class="rad-with-details">
                                        <input type="radio" id="rad1" required checked><label for="rad1">Sim</label>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Registrar</button>
                            </div>
                        </form>
                        {{-- <div class="other-links">
                            <div class="text">Ou registrar com</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div> --}}
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