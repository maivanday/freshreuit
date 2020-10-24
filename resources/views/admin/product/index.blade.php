  @extends('layouts.admin')
  @section('title')
  <title>Add product</title>
  @endsection

  @section('css')
  <link href="{{asset('admin_user/product/index/list.css')}}">
  @endsection

  @section('js')

  @endsection


  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('part.content-header',['name'=>'product','key'=>'List'])
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <a href="{{route('product.create')}}" class="btn btn-success m-2">Add</a>
                  </div>
                  <div class="col-md-12">

                      <table class="table table-dark">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Product Name</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Action</th>

                              </tr>
                          </thead>
                          <tbody>
                              @foreach($products as $productItem)

                              <tr>
                                  <th scope="row">{{$productItem->id}}</th>
                                  <td>{{$productItem->name}}</td>
                                  <td>{{ number_format($productItem->price) }}</td>
                                  <td>
                                      <img width="150px" height="100px" class="product_img" src="{{$productItem->feature_img_path}}" alt="">
                                  </td>
                                  <td>{{$productItem->category->name}}</td>

                                  <td>
                                      <a href="{{route('product.edit', ['id' => $productItem->id])}}" class="btn btn-default">Edit</a>
                                      <a href="" class="btn btn-danger">Delete</a>
                                  </td>

                              </tr>

                          </tbody>
                          @endforeach
                      </table>
                  </div>
                  <!-- phan trang -->
                  <div class="col-md-12">
                      {{$products->links()}}

                  </div>





              </div>

              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
