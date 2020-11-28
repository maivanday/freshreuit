@extends('layouts.product')

@section('title')
<title>Home user</title>
@endsection

@section('css')

<link rel="stylesheet" href="{{asset('frontend/dist/css/style.css')}}" />
@endsection

@section('content')
<div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>

    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid" src="{{asset('frontend/dist/img/slider_2.jpg')}}" alt="" />
            <div class="carousel-caption">
                <h2 class="display-4">Fresh Fruit</h2>

                <h2 class="display-2">Trái cây tươi mát</h2>
                <button type="button" class="btn btn-primary btn-lg">
                    MUA NGAY
                </button>
            </div>
        </div>

        <div class="carousel-item">
            <img class="img-fluid" src="{{asset('frontend/dist/img/slider_1.jpg')}}" alt="" />
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="{{asset('frontend/dist/img/slider_4.jpg')}}" alt="" />
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
            <img class="img-fluid" src="{{asset('frontend/dist/img/banner_1.jpg')}}" alt="" />
            <div class="carousel-caption">
                <button type="button" class="btn btn-primary btn-sm btn-responsive">
                    MUA NGAY
                </button>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4 pl-0 pr-0">
            <img class="img-fluid" src="{{asset('frontend/dist/img/banner_2.jpg')}}" alt="" />
            <div class="carousel-caption">
                <button type="button" class="btn btn-primary btn-sm btn-responsive">
                    MUA NGAY
                </button>
            </div>
        </div>

        <div class="col-12 col-xl-4 pr-0 pl-0">
            <img class="img-fluid" src="{{asset('frontend/dist/img/banner_3.jpg')}}" alt="" />
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
<!-- danh muc san pham -->
<div class="container-fluid">
    <div class="row">

        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="left-sidebar">

                        <div class="panel-group category-products" id="category">
                            <!--category-productsr-->
                            @foreach ($categorys as $Category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#category" href="#sportswear">
                                            <span class="badge pull-left"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            {{$Category->name}}

                                        </a>
                                    </h4>
                                </div>

                                <!-- chidrent -->
                                <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach ($Category->categoryChildren as $categoryChildren)
                                            <li><a href="{{route('category.product',['name'=>$categoryChildren->name,'id'=>$categoryChildren->id])}}">{{$categoryChildren->name}}</a></li> </a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- danh sach san pham -->
        <div class="col-md-10">
            <div class="product">
                <div class="product-list row">
                    @foreach($products as $product)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img src="{{$product->feature_image_path}}" class="img-thumbnail"></a>
                        <p><a href="#">{{$product->name}}</a></p>
                        <p class="price">{{number_format($product->price)}} vnd</p>
                        <div class="mask">
                            <a href="{{route('product.detail',
                                ['name'=>$product->name,
                                'id'=>$product->id])}}">Xem chi tiết</a>
                            <br>
                            <a href="#" data-url="{{route('product.addToCart',['id'=>$product->id])}}" class="add-to-cart btn btn-success"><i class="fa fa-shopping-cart"></i>Them vao gio hang</a>
                        </div>
                    </div>
                    @endforeach
                    <!--  -->


                </div>
                <div class="mx-auto mt-4">
                    <div class="mx-auto">{{$products->links()}}</div>
                </div>
            </div>

        </div>
        <!--  -->
    </div>
</div>


@endsection
<!-- gio hang -->
@section('js')
<script src=" {{asset('frontend/dist/js/addToCart.js')}}"></script>
@endsection
