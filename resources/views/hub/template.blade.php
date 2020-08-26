<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{URL::asset('images/icon/logo2-122x120.png')}}" type="image/x-icon">
        <title>DDC HUB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /*height: 100vh;*/
                margin: 0;
                overflow: auto;
            }

            .full-height {
                /*height: 100vh;*/
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                min-height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .card {
            	background: #fff;
            	border-radius: 2px;
            	display: inline-block;
            	height: 235px;
            	margin: 1rem;
            	position: relative;
            	width: 220px;
            	padding-top: 10px;
            	padding-bottom: 10px;
            	padding-right: 10px;
            	padding-left: 10px;
            }

            .card-1 {
            	border-radius: 50px 20px;
            	transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            }

            .card-1:hover {
            	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);s
            }

            label {
            	font-weight: bold;
            }
        </style>
        <script>
            $(document).ready(function(){
                $("#myModal").modal('show');
            });
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="flex-center position-ref full-height">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
