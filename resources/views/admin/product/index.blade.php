  @extends('layouts.admin')
  @section('title')
  <title>Add product</title>
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

                            <tr>
                                <th scope="row">1</th>
                                <td>khom</td>
                                <td>10.000</td>
                                <td><img src="" alt=""></td>
                                <td>Trai cay noi dia</td>

                                <td>
                                    <a href=""class="btn btn-default">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>

                    </tbody>
                </table>
            </div>
            <!-- phan trang -->
            <div class="col-md-12">

            </div>





        </div>

        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
