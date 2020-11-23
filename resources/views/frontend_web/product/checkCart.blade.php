<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show cart</title>
    <link rel="stylesheet" href="{{asset('frontend/dist/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('frontend/dist/css/style.css')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />


</head>

<body>
    @include('components/header_user');
    <div class="cart_wrapper ">

        <div class="cart" data-url="{{route('product.deleteCart')}}">
            <div class="container">
                <div class="row">
                    <table class="table update_cart_url " data-url="{{route('product.updateCart')}}">
                        <thead>
                            <tr>

                                <th scope=" col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach($carts as $id=> $cartItem)
                            @php
                            $total += $cartItem['price']*$cartItem['quantity'];
                            @endphp

                            <tr>
                                <th scope="row">{{$id}}</th>
                                <td>{{$cartItem['name']}}</td>
                                <td><img src="{{$cartItem['image']}} " class="img-thumbnail" width="100px" height="100px" alt=""></td>
                                <td>{{ number_format($cartItem['price'])}} vnd</td>

                                <td>
                                    {{$cartItem['quantity']}}</td>
                                <td>{{ number_format($cartItem['price']*$cartItem['quantity'])}} vnd</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- thong tin don hang -->
    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-8  p-lg-5 ">
                    <div>

                        <h5><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ nhận hàng</h5>
                        <a href="#address" data-toggle="modal">Thay đổi >></a>
                        <label class="anim">
                            @if( count($users->customers) >0 )
                            <ul style="list-style: none;">
                                @foreach( $users->customers as $customer )
                                <li>
                                    <!-- <input type="radio" class="rdoAddress" name="rdoaddress" @if($customer->active == 1) checked @endif value="{{$customer->email}}" style="float: left;">  -->
                                    <input type="checkbox" class="rdoAddress" name="{{$customer->id}}">
                                    <span>
                                        {{ $users->name }} | {{ $customer->phone }}
                                        <p>{{ $customer->address }}</p>

                                    </span>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            {{ 'Bạn chưa thêm địa chỉ nhận hàng' }}

                            @endif

                        </label>
                    </div>
                    <div>
                        <h5><i class="fa fa-truck" aria-hidden="true"></i> Phương thức vận chuyển</h5>

                        <label class="anim">

                            <span>
                                Giao hàng tiết kiệm: {{ number_format('20000') }} VNĐ
                                <p>Dự kiến giao hàng sau 3-4 ngày</p>
                            </span>

                        </label>
                    </div>

                </div>


                <div class="col-sm-4 p-lg-5">

                    <div>
                        <h5><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thông tin đơn hàng</h5>
                        <div class="checkbox">
                            <span class="row">
                                <p class="font-weight-bold">Tổng Tiền: &nbsp</p>
                                <p>{{number_format($total)}} VNĐ</p>

                            </span>

                            <span class="row">
                                <p class="font-weight-bold">Phí Vận Chuyển: &nbsp</p>
                                <p>{{ number_format(20000) }} VNĐ</p>

                            </span>


                        </div>
                    </div>
                    <div>
                        <span class="row">
                            <p class="font-weight-bold">Tổng Thanh Toán: &nbsp</p>
                            <p>{{ number_format($total + 20000) }} VNĐ</p>

                        </span>



                        <button type="button" class="btn  btn-primary submit check_out payment">Tiến hành thanh toán</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--  -->
    <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Thay đổi địa chỉ giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="">
                        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
                        @csrf
                        <div class=" form-group">
                            <label class="col-form-label">Tên khách hàng</label>
                            <input type="text" class="form-control name  " value="{{ $users->name}}" name="name" required="">
                            <label class="col-form-label errorName" style="color: red;"></label>


                        </div>
                        <div class=" form-group">
                            <label class="col-form-label">Địa Chỉ Email</label>
                            <input type="text" class="form-control email  " value="{{ $users->email}}" placeholder="Nhập địa chỉ email" name="email" required="">
                            <label class="col-form-label errorEmail" style="color: red;"></label>


                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control phone " placeholder="Nhập số điện thoại" name="phone" required="">
                            <label class="col-form-label errorPhone" style="color: red;"></label>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ</label>
                            <input type="text" class="form-control address  " placeholder="Nhập địa chỉ nhận hàng" name="address" required="">
                            <label class="col-form-label errorAddress" style="color: red;"></label>

                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="actives" name="active" checked>
                            <label class="">Dùng địa chỉ này cho các đơn hàng sau</label>
                        </div>
                        <div class="right-w3l">
                            <button type="button" class=" btn btn-primary form-control save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--  -->


    <!-- cart update -->





    <!--  -->
    <script src="{{asset('frontend/dist/js/jquery-3.5.1.min.js')}}"> </script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


    <script src="{{asset('frontend/dist/js/addInfoCustomer.js')}}"></script>

    <script src="{{asset('frontend/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/bootstrap.min.js')}}"></script>

    <!-- an error -->

    <!--  -->

    @if(isset($users)&& count($users->customers) == 0)
    <script>
        $('#address').modal('show');
    </script>
    @endif
</body>

</html>
