  @extends('layouts.admin')
  @section('title')
  <title>Add product</title>
  @endsection

  @section('css')
  <link href="{{asset('admin_user/product/index/list.css')}}">
  @endsection

  @section('js')
  <script src="{{asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
  <script src="{{asset('admin_user/product/index/list.js')}}"></script>

  @endsection


  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('part.content-header',['name'=>'Order','key'=>'List'])
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">

                  <div class="col-md-12">

                      <table class="table table-dark">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Order_id</th>
                                  <th scope="col">Product_id</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Price</th>

                              </tr>
                          </thead>
                          <tbody>
                              @foreach($orderItems as $orderItem)

                              <tr>
                                  <th scope="row">{{$orderItem->id}}</th>
                                  <td>{{$orderItem->order_id}}</td>
                                  <td>{{$orderItem->product_id}}</td>
                                  <td>{{$orderItem->quantity}}</td>
                                  <td>{{$orderItem->price}}</td>

                              </tr>

                          </tbody>
                          @endforeach
                      </table>
                  </div>
                  <!-- phan trang -->
                  <div class="col-md-12">
                      {{$orderItems->links()}}

                  </div>


              </div>

              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
