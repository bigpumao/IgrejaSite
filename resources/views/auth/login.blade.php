<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Área Administrativa</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href={{url('/')}}/css/animate.css>
    <style>
        /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
        @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

        body {
            margin: 0;
            padding: 0;
            background: #fff;

            color: #fff;
            font-family: Arial;
            font-size: 12px;
        }

        .body {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
            background-size: cover;
            -webkit-filter: blur(5px);
            z-index: 0;
        }

        .grad {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.65))); /* Chrome,Safari4+ */
            z-index: 1;
            opacity: 0.7;
        }

        .header {
            position: absolute;
            top: calc(50% - 35px);
            left: calc(50% - 255px);
            z-index: 2;
        }

        .header div {
            float: left;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 35px;
            font-weight: 200;
        }

        .header div span {
            color: #5379fa !important;
        }

        .login {
            position: absolute;
            top: calc(50% - 75px);
            left: calc(50% - 50px);
            height: 150px;
            width: 350px;
            padding: 10px;
            z-index: 2;
        }

        .login input[type=text] {
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
        }

        .login input[type=password] {
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
            margin-top: 10px;
        }

        .login input[type=submit] {
            width: 255px;
            height: 30px;
            background: #fff;
            border: 1px solid #fff;
            cursor: pointer;
            border-radius: 2px;
            color: #a18d6c;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
            margin-top: 10px;
            margin-left: 13px;
        }

        .login input[type=submit]:hover {
            opacity: 0.8;
        }

        .login input[type=submit]:active {
            opacity: 0.6;
        }

        .login input[type=text]:focus {
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .login input[type=password]:focus {
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .login input[type=button]:focus {
            outline: none;
        }

        ::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        ::-moz-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
<div class="body"></div>
<div class="grad"></div>
<div class="header col-xs-12">
    <div class="animated bounceInUp col-xs-12">IDB<span>Luziania</span></div>
</div>
<br>
{!! Form::open(array('route'  =>  'login' , 'method'  =>  'POST')) !!}
<div class="login animated bounceInDown col-xs-4 col-sm-12 col-md-12">

    <input type="text" placeholder="E-Mail" name="email"><br>
    <input type="password" placeholder="Senha" name="password"><br>
    <div class="row">
        <input type="submit"  value="Login" class="btn btn-default btn-md  animated bounceInRight">
    </div>


    {!! Form::close() !!}
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <strong>Esqueceu sua senha? Recupere </strong><a href="{{url('password/reset')}}">AQUI</a>
        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>
</html>
