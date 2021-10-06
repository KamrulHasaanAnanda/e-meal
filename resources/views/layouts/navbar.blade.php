<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-black">
    <a class="navbar-brand navbar-a" href="{{ url('/') }}">
        {{-- {{ config('app.name', 'Laravel') }} --}}
        E-Meal<span class="navbar-short-text">(Manage your meal)<span>
    </a>

    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarCollapse"
      aria-controls="navbarCollapse"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto sidenav bg-black" id="navAccordion">
            @if (Auth::guest())
            <></>
            @else
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Item 1</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link nav-link-collapse"
            href="#"
            id="hasSubItems"
            data-toggle="collapse"
            data-target="#collapseSubItems2"
            aria-controls="collapseSubItems2"
            aria-expanded="false"
          >Item 2</a>
          <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#navAccordion">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="nav-link-text">Item 2.1</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="nav-link-text">Item 2.2</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Item 3</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link nav-link-collapse"
            href="#"
            id="hasSubItems"
            data-toggle="collapse"
            data-target="#collapseSubItems4"
            aria-controls="collapseSubItems4"
            aria-expanded="false"
          >Item 4</a>
          <ul class="nav-second-level collapse" id="collapseSubItems4" data-parent="#navAccordion">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="nav-link-text">Item 4.1</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="nav-link-text">Item 4.2</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="nav-link-text">Item 4.2</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Item 5</a>
        </li>
        @endif
      </ul>

      <ul class="form-inline ml-auto mt-2 mt-md-0" style="margin-bottom:0px">
        @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
      </ul>
    </div>
  </nav>
  
  
  
  <footer class="footer">
    <div class="container">
        <div class="text-center">
            <span></span>
        </div>
    </div>
  </footer>