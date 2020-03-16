
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Meeting Room') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          @guest
            <ul class="navbar-nav mr-auto">

            </ul>
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Create <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('roomCategory.create')}}">Create Room Category</a> 
              <a class="dropdown-item" href="{{route('bookingCategory.create')}}">Create Booking Category</a> 
              <a class="dropdown-item" href="{{route('room.create')}}">Create Room</a> 
              <a class="dropdown-item" href="{{route('client.create')}}">Create Client</a> 
            </div>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                List <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('roomCategory.index')}}">Room Categories</a> 
              <a class="dropdown-item" href="{{route('bookingCategory.index')}}">Booking Categories</a> 
              <a class="dropdown-item" href="{{route('room.index')}}">Rooms</a> 
              <a class="dropdown-item" href="{{route('client.index')}}">Clients</a> 

            </div>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link" href="{{route('booking.create')}}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                Book a room <span class="caret"></span>
            </a>
          </li>
          @endguest
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="{{route('dashboard.index')}}">Dash Board</a>  --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
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
  </div>
</nav>