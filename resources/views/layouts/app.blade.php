<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Bullian Bay' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('assets/styles/btk.css')}}">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        
        /* === card component ====== 
        * Variation of the panel component
        * version 2018.10.30
        * https://codepen.io/jstneg/pen/EVKYZj
        */
        .card{ background-color: #fff; border: 1px solid transparent; border-radius: 6px; }
        .card > .card-link{ color: #333; }
        .card > .card-link:hover{  text-decoration: none; }
        .card > .card-link .card-img img{ border-radius: 6px 6px 0 0; }
        .card .card-img{ position: relative; padding: 0; display: table; }
        .card .card-img .card-caption{
        position: absolute;
        right: 0;
        bottom: 16px;
        left: 0;
        }
        .card .card-body{ display: table; width: 100%; padding: 12px; }
        .card .card-header{ border-radius: 6px 6px 0 0; padding: 8px; }
        .card .card-footer{ border-radius: 0 0 6px 6px; padding: 8px; }
        .card .card-left{ position: relative; float: left; padding: 0 0 8px 0; }
        .card .card-right{ position: relative; float: left; padding: 8px 0 0 0; }
        .card .card-body h1:first-child,
        .card .card-body h2:first-child,
        .card .card-body h3:first-child, 
        .card .card-body h4:first-child,
        .card .card-body .h1,
        .card .card-body .h2,
        .card .card-body .h3, 
        .card .card-body .h4{ margin-top: 0; }
        .card .card-body .heading{ display: block;  }
        .card .card-body .heading:last-child{ margin-bottom: 0; }

        .card .card-body .lead{ text-align: center; }

        @media( min-width: 768px ){
        .card .card-left{ float: left; padding: 0 8px 0 0; }
        .card .card-right{ float: left; padding: 0 0 0 8px; }
            
        .card .card-4-8 .card-left{ width: 33.33333333%; }
        .card .card-4-8 .card-right{ width: 66.66666667%; }

        .card .card-5-7 .card-left{ width: 41.66666667%; }
        .card .card-5-7 .card-right{ width: 58.33333333%; }
        
        .card .card-6-6 .card-left{ width: 50%; }
        .card .card-6-6 .card-right{ width: 50%; }
        
        .card .card-7-5 .card-left{ width: 58.33333333%; }
        .card .card-7-5 .card-right{ width: 41.66666667%; }
        
        .card .card-8-4 .card-left{ width: 66.66666667%; }
        .card .card-8-4 .card-right{ width: 33.33333333%; }
        }

        /* -- default theme ------ */
        .card-default{ 
        border-color: #ddd;
        background-color: #fff;
        margin-bottom: 24px;
        }
        .card-default > .card-header,
        .card-default > .card-footer{ color: #333; background-color: #ddd; }
        .card-default > .card-header{ border-bottom: 1px solid #ddd; padding: 8px; }
        .card-default > .card-footer{ border-top: 1px solid #ddd; padding: 8px; }
        .card-default > .card-body{  }
        .card-default > .card-img:first-child img{ border-radius: 6px 6px 0 0; }
        .card-default > .card-left{ padding-right: 4px; }
        .card-default > .card-right{ padding-left: 4px; }
        .card-default p:last-child{ margin-bottom: 0; }
        .card-default .card-caption { color: #fff; text-align: center; text-transform: uppercase; }


        /* -- price theme ------ */
        .card-price{ border-color: #999; background-color: #ededed; margin-bottom: 24px; }
        .card-price > .card-heading,
        .card-price > .card-footer{ color: #333; background-color: #fdfdfd; }
        .card-price > .card-heading{ border-bottom: 1px solid #ddd; padding: 8px; }
        .card-price > .card-footer{ border-top: 1px solid #ddd; padding: 8px; }
        .card-price > .card-img:first-child img{ border-radius: 6px 6px 0 0; }
        .card-price > .card-left{ padding-right: 4px; }
        .card-price > .card-right{ padding-left: 4px; }
        .card-price .card-caption { color: #fff; text-align: center; text-transform: uppercase; }
        .card-price p:last-child{ margin-bottom: 0; }

        .card-price .price{ 
        text-align: center; 
        color: #337ab7; 
        font-size: 3em; 
        text-transform: uppercase;
        line-height: 0.7em; 
        margin: 24px 0 16px;
        }
        .card-price .price small{ font-size: 0.4em; color: #66a5da; }
        .card-price .details{ list-style: none; margin-bottom: 24px; padding: 0 18px; }
        .card-price .details li{ text-align: center; margin-bottom: 8px; }
        .card-price .buy-now{ text-transform: uppercase; }
        .card-price table .price{ font-size: 1.2em; font-weight: 700; text-align: left; }
        .card-price table .note{ color: #666; font-size: 0.8em; }

    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ $title ?? 'Bullian Bay' }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                {{--<li><a href="{{ url('/home') }}">Home</a></li>--}}
                <!--<li id="users-online"><p class="navbar-text"><span v-cloak class="badge">@{{ usersOnline }}</span> Users Online</p></li>-->
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</div>
@yield('content')

<!-- JavaScripts -->
<script src="{{ url('assets/js/vue.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
<script>
    var socket = io(':3000');
</script>
@stack('scripts')
<script>
    new Vue({
        el: '#users-online',
        data: {
            usersOnline: 1
        },
        ready: function () {
            socket.on('visitorsConnected', function (data) {
                this.usersOnline = data;
            }.bind(this));
        }
    });
</script>

</body>
</html>
