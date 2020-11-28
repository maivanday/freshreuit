@extends('layouts.frontend')

@section('title')
<title>Category_List</title>
@endsection

@section('css')

<link rel="stylesheet" href="{{asset('frontend/dist/css/style.css')}}" />

@endsection

@section('content')

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
                                'id'=>$product->id])}}"></i>Xem chi tiết</a>
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


<!--  -->


<!-- --- -->





<!-- ----------------------footer -->

@endsection
