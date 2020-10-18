  @extends('layouts.admin')
  @section('title')
  <title>Trang chu</title>
@endsection
@section('content')

  <div class="content-wrapper">
    <
   @include('part.content-header',['name'=>'category','key'=>'Edit'])


    <!--  content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">

            <form action="{{route('categories.update',['id'=>$category->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text " class="form-control" placeholder="Nhập tên danh mục" name="name"
                    value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <label for="">Chọn loại danh mục</label>
                    <select  class="form-control" name ="parent_id">
                        <option value="0">Chọn loại danh mục</option>
                        {!! $htmlOption !!}
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.content -->
  </div>

@endsection
