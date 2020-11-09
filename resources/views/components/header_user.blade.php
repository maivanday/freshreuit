<nav class=" navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a href="" class="navbar-branch">
            <img src="{{asset('frontend/dist/img/logo.png')}}" alt="" height="80px" />
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="{{route('home')}}" class="nav-item nav-link active">Giới thiệu</a>
                <a href="#" class="nav-item nav-link active">xinchao! {{ Auth::user()->name}}</a>

                <!-- <a href="" class="nav-item nav-link">logout</a> -->

                <a href="" class="nav-item nav-link">Giỏ hàng</a>
                <!--
                <a href="{{route('register')}}" class="nav-item nav-link">Đăng ký</a> -->

                <a href="{{route('logout')}}" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </div>
</nav>
