  @extends('layouts.admin')
  @section('title')
  <title>order</title>
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
                                  <th scope="col">User_id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Total</th>


                              </tr>
                          </thead>
                          <tbody>
                              @foreach($orders as $order)

                              <tr>
                                  <th scope="row">{{$order->id}}</th>
                                  <td>{{$order->user_id}}</td>
                                  <td>{{$order->name}}</td>
                                  <td>{{$order->address}}</td>
                                  <td>{{$order->email}}</td>
                                  <td>{{$order->phone}}</td>
                                  <td>{{ $order->price }}</td>

                              </tr>

                          </tbody>
                          @endforeach
                      </table>
                  </div>
                  <!-- phan trang -->
                  <div class="col-md-12">
                      {{$orders->links()}}

                  </div>





              </div>

              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
