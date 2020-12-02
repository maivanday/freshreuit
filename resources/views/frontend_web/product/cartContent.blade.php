@if (session('cart'))
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

                        <th scope="col">Sửa/Xóa</th>
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
                            <input type="number" id="quantity" value="{{$cartItem['quantity']}}" min="1"></td>
                        <td>{{ number_format($cartItem['price']*$cartItem['quantity'])}} vnd</td>

                        <td>
                            <a href="" data-id="{{$id}}" id="idProduct" class="btn d-none btn-primary cart_update ">Cập nhật</a>
                            <a href="" data-id="{{$id}}" class="btn btn-danger cart_delete ">Xóa</a>

                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="col-md-12">
                <div class="row">
                    <h4>Tổng tiền thanh toán: {{number_format($total)}} vnd</h4>
                    <a href="{{route('product.checkCart')}}" class="btn btn-primary ml-5">Kiểm tra đơn hàng</a>


                </div>
            </div>
        </div>
    </div>
</div>
@else
<p>khong co</p>
@endif
