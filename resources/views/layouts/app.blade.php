<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="background-color: #efdbc1">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
               

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="nav navbar-nav">
                     <a class="navbar-brand" href="{{ url('/') }}">
                        Blog
                    </a>
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
                                    {{ Auth::user()->name }}
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
                    @guest
                        &nbsp;
                           
                   
                    @else
                        @if(Auth::user()->role[0]->name=='admin' OR Auth::user()->role[0]->name=='author')
                          @if(Auth::user()->role[0]->name=='admin')
                             <a href="/admin/userRole" class="btn " style="color: black">User Roles</a>
                             
                            @endif
                            <a href="{{ url('content/content') }}" class="btn " style="color: black">Content</a>
                            <!-- <div class="dropdown btn " style="margin-top: 10px; ">
                              <a  class=" dropdown dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">Content </a>
                                <ul class="dropdown-menu" role="menu" style="text-align:center;color: black">
                                  <li><a href="{{ url('content/add-content') }}" class="btn " style="color: black">Add Content</a></li>
                                  <li><a href="{{ url('content/edit-content') }}" class="btn " style="color: black">Edit Content</a></li>
                                </ul>
                             </div> -->
                             <!--  <div class="dropdown btn " style="margin-top: 10px; ">
                              <a  class=" dropdown dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">Category</a>
                                <ul class="dropdown-menu" role="menu" style="text-align:center;color: black">
                                  <li><a href="{{ url('/create-device') }}" class="btn " style="color: black">Edit Category</a></li>
                                  <li><a href="{{ url('/device-details') }}" class="btn " style="color: black">Register Category</a></li>
                                </ul>
                             </div>
                              <div class="dropdown btn " style="margin-top: 10px; ">
                              <a  class=" dropdown dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">Tags</a>
                                <ul class="dropdown-menu" role="menu" style="text-align:center;color: black">
                                  <li><a href="{{ url('/create-device') }}" class="btn " style="color: black">Edit Tags</a></li>
                                  <li><a href="{{ url('/device-details') }}" class="btn " style="color: black">Register Tags</a></li>
                                </ul>
                             </div> -->
                        
                        @endif
                       
                         
                    @endguest
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
