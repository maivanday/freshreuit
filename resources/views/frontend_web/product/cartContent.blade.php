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
                            <input type="number" value="{{$cartItem['quantity']}}" min="1"></td>
                        <td>{{ number_format($cartItem['price']*$cartItem['quantity'])}} vnd</td>

                        <td>
                            <a href="" data-id="{{$id}}" class="btn btn-primary cart_update">Cập nhật</a>
                            <a href="" data-id="{{$id}}" class="btn btn-danger cart_delete">Xóa</a>

                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="col-md-12">
                <h4>Tổng tiền thanh toán: {{number_format($total)}} vnd</h4>
            </div>
        </div>
    </div>
</div>
