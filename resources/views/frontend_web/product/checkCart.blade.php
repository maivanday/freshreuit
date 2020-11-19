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

</head>

<body>
    @include('components/header_user');
    <div class="cart_wrapper">

        <div class="cart" data-url="{{route('product.deleteCart')}}">
            <div class="container-fluid">
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
                                <td><img src="{{$cartItem['image']}} " class="img-thumbnail" width="150px" height="100px" alt=""></td>
                                <td>{{ number_format($cartItem['price'])}} vnd</td>

                                <td>
                                    {{$cartItem['quantity']}}</td>
                                <td>{{ number_format($cartItem['price']*$cartItem['quantity'])}} vnd</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- <div class="col-md-12">
                        <div class="row">
                            <h4>Tổng tiền thanh toán: {{number_format($total)}} vnd</h4>

                        </div>
                    </div> -->
                </div>
            </div>
        </div>


    </div>
    <!--  -->
    <form method="post">
        <div class="row">
            <div class="col-sm-8">
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <h5 style="float: left;"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</h5>
                            <a href="#address" style="float: right;" data-toggle="modal">Thay đổi >></a>
                            <div class="checkbox" style=" clear: both;">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        @if( count($users->customers) >0 )
                                        <ul style="list-style: none;">
                                            @foreach( $users->customers as $customer )
                                            <li>
                                                <input type="radio" class="rdoAddress" name="rdoaddress" @if($cus->active == 1) checked @endif value="{{$customer->email}}" style="float: left;">
                                                <span style="float: left;">
                                                    <i class="name{{ $key }}">{{ $users->name }}</i> | <i class="phone{{$key}}">{{ $customer->phone }}</i>
                                                    <p class="address{{$key}}">{{ $customer->address }}</p>
                                                </span>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @else
                                        {{ 'Bạn chưa thêm địa chỉ nhận hàng' }}
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);margin-top: 10px;">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <h5><i class="far fa-truck"></i> Phương thức vận chuyển</h5>
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <input type="checkbox" class="checkbox" checked style="float: left;">
                                        <span style="float: left;">
                                            Chuyển phát tiêu chuẩn
                                            <p>Dự kiến giao hàng sau 3-4 ngày</p>
                                        </span>
                                        <span style="float: right; margin-left: 240px;">{{ number_format('20000') }} VNĐ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">


                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <h5 style="text-align: center;"><i class="fas fa-shopping-cart"></i> Thông tin đơn hàng</h5>
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <p style="float: left;font-weight: bold;">Tổng Tiền</p>
                                        <p style="margin-left: 10px;float: left;">{{number_format($total)}} VNĐ</p>
                                    </label>
                                    <label class="anim">
                                        <p style="float: left;font-weight: bold;">Phí vận chuyển</p>
                                        <p style="margin-left: 10px;float: left;">{{ number_format(20000) }} VNĐ</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px;">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <p style="float: left;font-weight: bold;">Tổng thanh toán</p>
                                        <p style="margin-left: 3px;float: left;" class="paytotal">{{ number_format($total + 20000) }} VNĐ</p>
                                    </label>
                                    <label class="anim">
                                        <button type="button" class="btn submit check_out payment">Tiến hành thanh toán</button>
                                    </label>
                                </div>
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ Email</label>
                            <input type="text" class="form-control email" value="{{ $user->email ?? '' }}" placeholder="Nhập địa chỉ email" name="email" required="">
                            <label class="col-form-label errorEmail" style="color: red;"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control phone" placeholder="Nhập số điện thoại" name="phone" required="">
                            <label class="col-form-label errorPhone" style="color: red;"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ</label>
                            <input type="text" class="form-control address" placeholder="Nhập địa chỉ nhận hàng" name="address" required="">
                            <label class="col-form-label errorAddress" style="color: red;"></label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="actives" name="active" checked>
                            <label class="" for="customControlAutosizing">Dùng địa chỉ này cho các đơn hàng sau</label>
                        </div>
                        <div class="right-w3l">
                            <button type="button" class="btn btn-primary form-control addAdress">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- cart update -->
    <script src="{{asset('frontend/dist/js/jquery-3.5.1.min.js')}}"> </script>


    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdate = $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input').val();


            $.ajax({
                type: "GET",
                url: urlUpdate,
                data: {
                    id: id,
                    quantity: quantity
                },
                success: function(data) {

                    if (data.code === 200) {
                        $('.cart_wrapper').html(data.cartUpdate);
                        alert('Cập nhật thành công');
                    }
                },
                error: function() {

                }

            });

        }

        //
        function cartDelete(event) {
            event.preventDefault();
            let urlDelete = $('.cart').data('url');
            let id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {
                    id: id,

                },
                success: function(data) {

                    if (data.code === 200) {
                        $('.cart_wrapper').html(data.cartUpdate);
                        alert('Xoá nhật thành công');
                    }
                },
                error: function() {

                }

            });

        }
        //
        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_delete', cartDelete);

        });
    </script>
    <script src="{{asset('frontend/dist/js/jquery-3.5.1.min.js')}}"> </script>
    <script src="{{asset('frontend/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/bootstrap.min.js')}}"></script>
</body>



</html>
