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
        <div class="col-md-12 mt-3">

            <div class="product ">
                <div class="product-list row">
                    @foreach($products as $product)
                    <div class="product-item col-md-6  col-xs-12">
                        <img class="set_img" src="{{$product->feature_img_path}}">
                        <div class="row ml-1">
                            @foreach($product->productImage as $imgList)
                            <img src="{{$imgList->image_path}}" class="img-list">
                            @endforeach
                        </div>


                    </div>
                    <div class="col-md-6">
                        <h2> CHI TIẾT SẢN PHẨM</h2>
                        <p>Tên sản phẩm: {{$product->name}}</p>
                        <p>Loại sản phẩm: {{$product->category->name}}</p>
                        <p class="price">Giá sản phẩm: {{number_format($product->price)}} vnd</p>
                        <span>Tag</span>
                        @foreach($product->tags as $productTag)
                        <span class="tag-color"> {{$productTag->name}}</span>
                        @endforeach
                        <br>
                        <a href="#" data-url="{{ route('product.addToCart',['id'=>$product->id])}}" class="btn btn-success mt-3 mb-3 add_to_cart">Mua ngay </a>
                        <p>{{$product->content}}</p>
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
@section('js')
<script>
    function addToCart(event) {
        event.preventDefault();

        let urlCart = $(this).data('url');

        $.ajax({
            type: "GET",
            url: urlCart,
            dataType: 'json',
            success: function(data) {
                if (data.code === 200) {
                    alert('them san pham thanh cong')

                }

            },
            error: function() {

            }
        });


    }
    $(function() {
        $('.add_to_cart').on('click', addToCart);
    });
</script>


@endsection


<!-- --- -->





<!-- ----------------------footer -->

@endsection
