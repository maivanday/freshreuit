<!--category-tab-->

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Sản phẩm mới nhất</h1>
        </div>
    </div>
</div>
<div class="container mt-3">
    <h2 text-center></h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="category_name">

        @foreach ($categorys as $indexCategory =>$categoryItem)
        <li class="{{$indexCategory == 0 ? 'active' : ''}} "><a href="#category_{{$categoryItem->id}}" data-toggle="tab">{{ $categoryItem->name}} &nbsp</a></li>
        @endforeach

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        @foreach ($categorys as $indexProduct =>$categoryItemProduct)
        <div class=" tab-pane fade active show {{$indexProduct == 0 ? 'active':''}}" id="category_{{$categoryItemProduct->id}}">
            </<br>
            <div class="row">

                @foreach($categoryItemProduct->products as $productItemTab)

                <div class="col-md-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center product-item">
                                <img src="{{ $productItemTab->feature_img_path}}" class=" img-thumbnail" />
                                <h5>{{ number_format( $productItemTab->price)}} vnd</h5>
                                <p>{{$productItemTab->name}}</p>
                                <div class="mask">

                                    <a href="{{route('product.detail',
                                ['name'=>$productItemTab->name,
                                'id'=>$productItemTab->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- ------------------------------- -->
