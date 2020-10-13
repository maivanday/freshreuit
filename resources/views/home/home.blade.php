<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>
    <link
      rel="stylesheet"
      href="{{asset('index/dist/css/bootstrap.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('index/dist/css/font-awesome.min.css')}}"
    />
    <script src="{{asset('index/dist/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('index/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('index/dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('index/dist/css/style.css')}}" />
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
      <div class="container-fluid">
        <a href="" class="navbar-branch">
          <img src="{{asset('index/dist/img/logo.png')}}" alt="" height="80px" />
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ml-auto">
            <a href="" class="nav-item nav-link active">Trang chủ</a>

            <a href="" class="nav-item nav-link">Liên hệ</a>

            <a href="" class="nav-item nav-link">Giỏ hàng</a>

            <a href="" class="nav-item nav-link">Đăng ký</a>

            <a href="" class="nav-item nav-link">Đăng nhập</a>
          </div>
        </div>
      </div>
    </nav>
    <div id="slides" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
        <li data-target="#slides" data-slide-to="3"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="img-fluid" src="{{asset('index/dist/img/slider_1.png')}}" alt="" />
          <div class="carousel-caption">
            <h2 class="display-4">Fresh Fruit</h2>

            <h2 class="display-2">Trái cây tươi mát</h2>
            <button type="button" class="btn btn-primary btn-lg">
              MUA NGAY
            </button>
          </div>
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('index/dist/img/slider_2.jpg')}}" alt="" />
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('index/dist/img/slider_3.jpg')}}" alt="" />
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('index/dist/img/slider_4.jpg')}}" alt="" />
        </div>
      </div>
    </div>
    <!-- jumbotron -->
    <!-- <div class="container-fluid">
      <div class="jumbotron">
        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad dolore
            deleniti illum dolores sunt! Magnam, quasi minus. Eligendi omnis
            beatae aperiam dolorum dicta amet delectus, enim obcaecati veritatis
            consequuntur qui.
          </p>
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
          <a href="#">
            <button type="button" class="btn btn-outline-secondary">
              Dang ky ngay
            </button>
          </a>
        </div>
      </div>
    </div> -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-xl-4 pl-0 pr-0">
          <img class="img-fluid" src="{{asset('index/dist/img/banner_1.jpg')}}" alt="" />
          <div class="carousel-caption">
            <button type="button" class="btn btn-primary btn-sm btn-responsive">
              MUA NGAY
            </button>
          </div>
        </div>
        <div class="col-sm-6 col-xl-4 pl-0 pr-0">
          <img class="img-fluid" src="{{asset('index/dist/img/banner_2.jpg')}}" alt="" />
          <div class="carousel-caption">
            <button type="button" class="btn btn-primary btn-sm btn-responsive">
              MUA NGAY
            </button>
          </div>
        </div>

        <div class="col-12 col-xl-4 pr-0 pl-0">
          <img class="img-fluid" src="{{asset('index/dist/img/banner_3.jpg')}}" alt="" />
          <div class="carousel-caption">
            <button type="button" class="btn btn-primary btn-sm btn-responsive">
              MUA NGAY
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- -------------------- -->
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1>Danh mục sản phẩm</h1>
        </div>
      </div>
    </div>
    <!--  -->
    <nav class="navbar-expand-md navbar-light bg-light" id="dropdown">
      <div class="container">
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbar"
        >
          <span>xem thêm </span>
          <span class="btn btn-primary dropdown-toggle"></span>
        </button>
        <div class="collapse navbar-collapse align-items-center" id="navbar">
          <div class="navbar-nav m-auto">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a href="" class="nav-link">Trái cây Việt Nam</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link"> &nbsp Trái cây Hàn Quốc </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">&nbsp Trái cây NewZealand</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">&nbsp Trái cây Đài Loan</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">&nbsp trái cây Nam Phi</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- danh sach san pham -->
    <div class="container">
      <div class="product">
        <div class="product-list row">
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
          <!--  -->
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
          <!--  -->
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
          <!--  -->
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
          <!--  -->
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
          <!--  -->
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
          <!--  -->
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
          <!--  -->
          <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"
              ><img src="{{asset('index/dist/img/product1.jpg')}}" class="img-thumbnail"
            /></a>
            <p><a href="#">khom vang </a></p>
            <p class="price">10.000 vnd</p>
            <div class="mask">
              <a href="#">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
    <div class="container-fluid mt-5 pl-0 pr-0">
      <div class="carousel-item active">
        <img src="{{asset('index/dist/img/banner_4.jpg')}}" alt="" width="100%" height="450px" />
        <div id="top" class="carousel-caption">
          <h2 class="display-4">Fresh Fruit</h2>

          <h2 class="display-2">Ưu đãi đặt biệt</h2>
          <button type="button" class="btn btn-primary btn-lg">-50%</button>
        </div>
      </div>
    </div>
  </body>
</html>
