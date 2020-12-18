<nav class=" navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a href="{{ route('home')}}" class="navbar-branch">
            <img src="{{asset('frontend/dist/img/logo.png')}} " alt="" height="80px" />
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="{{route( 'home.user')}}" class="nav-item nav-link active">Home</a>

                <a href="#" class="nav-item nav-link active">xinchao! {{ Auth::user()->name}}</a>

                <a href="{{route('product.showCart')}}" class="nav-item nav-link">Giỏ hàng</a>

                <a href="{{route('logout')}}" class="nav-item nav-link">Đăng xuất</a>
            </div>
        </div>
    </div>
</nav>
