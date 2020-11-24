<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>$okopedia @yield('title')</title>

    <script src="{{asset('/js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body class="lightGreyBackground">
    <nav class="navbar navbar-expand-sm navbar-light bg-light" aria-label="navigation">
      <div class="container justify-content-around">
        <a
          class="navbar-brand"
          href="{{'/$okopedia'}}"
          style="color: rgb(3, 172, 14); font-weight: 500"
          >$okopedia</a
        >
        <button
          class="navbar-toggler d-lg-none"
          type="button"
          data-toggle="collapse"
          data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-3" id="collapsibleNavId">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="width: 100%">
            <li class="nav-item" style="width: 100%">
              <form class="form-inline my-2 my-lg-0 d-flex justify-content-center">
                <input
                  class="form-control mr-sm-2 col-xl-8 col-lg-7 col-md-5 col-sm-5 col-5"
                  type="search"
                  placeholder="Search Item"
                  aria-label="Search"
                />
                <button
                  class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                  type="submit"
                >
                  Search
                </button>
                @if (Auth::check())
                  <a href="{{url('$okopedia/cart')}}" class="btn btn-success mr-sm-2" role="button">
                    Cart
                    <span class="badge badge-light">
                      @if ($carts->isEmpty())
                          0
                      @else
                          {{$carts->count()}}
                      @endif
                    </span>
                  </a>
                <a href="{{url('$okopedia/transaction-history')}}" class="btn btn-success" role="button">History</a>
              </form>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{url('/logout')}}">Log Out</a>
              </div>
            </li>
                @else
                  </form>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/register')}}">Register</a>
            </li>   
                @endif

                
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
</body>
</html>