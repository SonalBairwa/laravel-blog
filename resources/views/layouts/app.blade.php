<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="background-color: #efdbc1">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="nav navbar-nav">
                    @guest
                        &nbsp;
                           
                   
                    @else
                        @if(Auth::user()->role[0]->name=='admin' OR Auth::user()->role[0]->name=='author')
                          @if(Auth::user()->role[0]->name=='admin')
                            <li><a href="{{ url('login') }}">Edit2</a></li>
                            <li><a href="{{ url('register') }}">profile2</a></li>
                            @endif
                            <div class="dropdown btn " style="margin-top: 10px; ">
                              <a  class=" dropdown dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">Content <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" style="text-align:center;color: black">
                                  <li><a href="{{ url('content/add-content') }}" class="btn " style="color: black">Add Content</a></li>
                                  <li><a href="{{ url('content/edit-content') }}" class="btn " style="color: black">Edit Content</a></li>
                                </ul>
                             </div>
                              <div class="dropdown btn " style="margin-top: 10px; ">
                              <a  class=" dropdown dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">Category <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" style="text-align:center;color: black">
                                  <li><a href="{{ url('/create-device') }}" class="btn " style="color: black">Edit Category</a></li>
                                  <li><a href="{{ url('/device-details') }}" class="btn " style="color: black">Register Category</a></li>
                                </ul>
                             </div>
                              <div class="dropdown btn " style="margin-top: 10px; ">
                              <a  class=" dropdown dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">Tags <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" style="text-align:center;color: black">
                                  <li><a href="{{ url('/create-device') }}" class="btn " style="color: black">Edit Tags</a></li>
                                  <li><a href="{{ url('/device-details') }}" class="btn " style="color: black">Register Tags</a></li>
                                </ul>
                             </div>
                        
                        @endif
                       
                         
                    @endguest
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/editProfile') }}">Profile</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        @yield('reviewpagescript')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
