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
        <div class="website-logo">
            <a href="/">
                <div class="logo">
                    <img class="logo-size" src="{{asset('template_login/images/logo-light.svg')}}" alt="">
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
                        <h3>Redefinir Password</h3>
                        <p>Para redefinir a password, introduza seu email que se registrou</p>
                        <form>
                            <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                            <div class="form-button full-width">
                                <button id="submit" type="submit" class="ibtn btn-forget">Enviar link para redefinir password</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="form-sent">
                        <div class="tick-holder">
                            <div class="tick-icon"></div>
                        </div>
                        <h3>Password link sent</h3>
                        <p>Please check your inbox iofrm@iofrmtemplate.io</p>
                        <div class="info-holder">
                            <span>Unsure if that email address was correct?</span> <a href="#">We can help</a>.
                        </div>
                    </div> --}}
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