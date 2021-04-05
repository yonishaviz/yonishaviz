<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- CSRF Token -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

    <style>
    lo {
  float: left;
 }

lo a {
  display: grid;
  color: deepskyblue;
  text-align: center;
    font-size-adjust: auto;
  padding: 14px 16px;
  text-decoration: none;
}

lo a:hover {
  background-color: lightgreen;
 background-color: black;
    color: white;
}
        .SelCat{
          background-color: forestgreen;
    }
        .product-section{
            display: grid;
            grid-template-columns: 1fr 3fr;
            margin: 80px auto 80px;
        }

        .product-image{
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-color: green;
            padding: 20px;
            text-align: center;
            height: 400px;
             img{
                opacity: 0;
                transition: opacity .10 ease-in-out;
            }

            img.active{
                opacity: 1;
            }
           
        }
        .product-section-images{
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
            margin-top: 20px;

        }
        .product-section-thumbnail{
            display: flex;
            align-items: center;
            border: 1px solid lightgray;
            min-height: 1px;
             cursor: pointer;
             &:hover{
                border:4px solid #979797;
        }}
        .products{
        display: grid;
         grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 60px $gutter;
        }
            .product-price{
        color: $text-color-light;
            }
            section {
  display: -webkit-flex;
  display: flex;
}
.foter{
              background-color: grey;
              padding: 20px;
margin-right: 20px;
margin-left: 20px;              

}



    </style>
    <body>
     <div id="app">
        <br>
        <nav class="foter">
            <div class="container">
                
                 

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                         <a class="nav-link" href="/"><font face="Times New Roman" size="5" color="white"> Shop </font></a>       &nbsp&nbsp



                         <a class="nav-link" href="/posts/"><font face="Times New Roman" size="5" color="white">About</font></a>


 &nbsp&nbsp
                        <a class="nav-link" href="{{route('cart.index')}}"><font face="Times New Roman" size="5" color="white">Cart </font>
                        @if(Cart::instance('default')->count()>0)
                            <span><font face="Times New Roman" size="5" color="white">{{Cart::instance('default')->count()}}</font></span>
                        @endif

                        </a>       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp
                        @guest
                                <a class="nav-link" href="{{ route('login') }}"> <font face="Times New Roman" size="5" color="white">{{ __('Login') }} </font></a>
                                &nbsp&nbsp
                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}"><font face="Times New Roman" size="5" color="white">{{ __('Register') }} </font></a>

                            @endif
                        @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <font face="Times New Roman" size="5" color="white"> {{ Auth::user()->name }}</font> <span class="caret"></span>
                                </a>

                            
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><font face="Times New Roman" size="5" color="white">
                                        {{ __('Logout') }}
                                    </font></a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf         </form>
                                
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<br>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
 </body>
</html>









