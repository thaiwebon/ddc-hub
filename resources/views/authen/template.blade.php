<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{URL::asset('images/icon/logo2-122x120.png')}}" type="image/x-icon">
        <title>DDC AUTHENTICATION</title>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
           

            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');

            $c: rgb(100, 149, 237);

            ::selection {
              background: transparent
            }

            * {
              user-select: none;
            }

            .containerform {
              height: 80vh;
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
            }

            h1 {
              font-family: 'Dancing Script', serif;
            }

            .form-input {
              font-family: 'Poppins', sans-serif;
              position: relative;
              width: 250px;
              height: 60px;
              line-height: 50px;
            }

            label {
              position: absolute;
              top: 0;
              left: 0.5rem;
              width: 100%;
              color: #d3d3d3;
              transition: 0.2s all;
              cursor: text;
            }

            input {
              width: 100%;
              border: 0;
              outline: 0;
              padding: 0.5rem;
              border: 2px solid #d3d3d3;
              box-shadow: none;
              color: #333;
              border-radius: 3px;
            }  

            input:invalid {
              outline: 0;
            }

            input:focus,
            input:valid {
              border-color: $c;
            }

            input:focus~label,
            input:valid~label {
              padding: 0 !important;
              font-size: 14px;
              top: -15px;
              color: $c;
            }

            span {
              background-color: white;
              padding: 0 2px;
            } 

            button {
              position: relative;
              padding: 0.7rem;
              width: 200px;
              left: 10px;
              border: 0;
              outline: 0;
              color: white;
              border-radius: 4px;
              background-color: $c;
              box-shadow: 0 0 15px rgba($c, 0.3);
              transition: 0.4s ease;
            }

            button:hover {
              cursor: pointer;
              box-shadow: 0 0 15px rgba($c, 0.9);
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
