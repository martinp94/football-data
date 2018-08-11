<nav class="navbar navbar-expand-lg navbar-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('matches.recent') }}"> Utakmice <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/uzivo">Uživo</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Takmičenja
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('leagues.all') }}">Lige</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Liga šampiona</a>
          <a class="dropdown-item" href="#">Liga Evrope</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Evropsko prvenstvo</a>
          <a class="dropdown-item" href="#">Svjetsko prvenstvo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Kupovi</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('teams.all') }}"> Klubovi <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>

    <ul class="navbar-nav mr-5">

      @guest

      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }} </a>
         
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }} </a>
         
      </li>

      @else

      <li class="nav-item dropdown">
        
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            {{ __('Logout') }}

          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
          
        </div>

      </li>

      @endguest

      
    </ul>

  </div>
</nav>

