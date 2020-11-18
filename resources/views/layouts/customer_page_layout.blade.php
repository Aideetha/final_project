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
    {{-- <nav class="navbar navbar-expand-sm navbar-light bg-light" aria-label="navigation">
      <div class="container justify-content-around">
        <a
          class="navbar-brand"
          href="#"
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
              <form class="form-inline my-2 my-lg-0 d-flex">
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
                <button class="btn btn-success mr-sm-2" type="button">
                  Cart <span class="badge badge-light">0</span>
                </button>
                <button class="btn btn-success" type="button">History</button>
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
                Username
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Log Out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav> --}}

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container justify-content-around">
        <a
          class="navbar-brand"
          href="#"
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
              <form class="form-inline my-2 my-lg-0 d-flex">
                <input
                  class="form-control mr-sm-2 col-lg-10 col-md-9 col-sm-8"
                  type="search"
                  placeholder="Search Item"
                  aria-label="Search"
                />
                <button
                  class="btn btn-outline-success my-2 my-sm-0"
                  type="submit"
                >
                  Search
                </button>
              </form>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
</body>
</html>