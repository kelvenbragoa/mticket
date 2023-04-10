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
                        <h3>Password Reset</h3>
                        <p>To reset your password, enter the email address you use to sign in to iofrm</p>
                        <form>
                            <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                            <div class="form-button full-width">
                                <button id="submit" type="submit" class="ibtn btn-forget">Send Reset Link</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-sent">
                        <div class="tick-holder">
                            <div class="tick-icon"></div>
                        </div>
                        <h3>Password link sent</h3>
                        <p>Please check your inbox iofrm@iofrmtemplate.io</p>
                        <div class="info-holder">
                            <span>Unsure if that email address was correct?</span> <a href="#">We can help</a>.
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