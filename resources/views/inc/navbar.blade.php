<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class = "container">
        <!-- Brand -->
        <a class="navbar-brand" href="/">{{config('app.name','Soap Dish')}}</a>
    
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">

            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item border-right">
                    <a class="nav-link" href="/services">Services</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/recipes">Recipes</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="/posts">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-right" href="/recipes/design">Design</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>    
                        </li>
                        <li class="nav-item nav-link">{{ Auth::user()->name }}</li>"
                @endif
            </ul>
        </div>
    </div>
  </nav>


