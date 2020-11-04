@extends('layouts.product')

@section('title')
<title>Product Detail</title>
@endsection

@section('css')

<link rel="stylesheet" href="{{asset('frontend/dist/css/style.css')}}" />

@endsection

@section('content')


<!-- danh muc san pham -->
<div class="container-fluid">
    <div class="row">
        <!-- danh sach san pham -->
        <div class="col-md-10">
            <div class="product">
                <div class="product-list row">
                    @foreach($products as $product)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img src="{{$product->feature_img_path}}" class="img-thumbnail"></a>
                        <p><a href="#">{{$product->name}}</a></p>
                        <p class="price">{{number_format($product->price)}} vnd</p>

                    </div>

                    @endforeach
                    <!--  -->

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
