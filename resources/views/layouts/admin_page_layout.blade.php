<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin @yield('title')</title>

    <script src="{{asset('/js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
    <nav id="adminNavbar" class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand colorWhite boldText" href="{{url('admin')}}">ADMIN</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle colorWhite"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Product
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('admin/add-product')}}">Add Product</a>
              <a class="dropdown-item" href="{{url('admin/products')}}">Show All Product</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle colorWhite"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Category
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('admin/add-category')}}">Add Category</a>
              <a class="dropdown-item" href="{{url('admin/categories')}}">Show All Category</a>
            </div>
          </li>          
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle colorWhite"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              $okopedia
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('logout')}}">Log Out</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    @yield('content')
</body>
</html>