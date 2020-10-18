  @extends('layouts.admin')
  @section('title')
  <title>Add product</title>
  @endsection

  @section('css')
  <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
  <link href="{{asset('admin_user/product/add/add.css')}}" rel="stylesheet" />

  @endsection
  @section('content')

  <div class="content-wrapper">
      @include('part.content-header',['name'=>'Product','key'=>'add'])


      <!--  content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6">

                      <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="">Tên sản phẩm</label>
                              <input type="text " class="form-control" placeholder="Nhập tên danh mục" name="name">
                          </div>
                          <div class="form-group">
                              <label for="">Giá sản phẩm</label>
                              <input type="text " class="form-control" placeholder="Nhập gia san pham" name="price">
                          </div>

                          <div class="form-group">
                              <label for="">Ảnh sản phẩm</label>
                              <input type="file" class="form-control-file" name="feature_img_path">
                          </div>

                          <div class="form-group">
                              <label for="">Ảnh chi tiết</label>
                              <input type="file" multiple class="form-control-file" name="image_path[]">
                          </div>


                          <div class="form-group">
                              <label for="">Nhập tag</label>
                              <select class="form-control tags_select" multiple="multiple" name="tags[]">
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="">Chọn loại danh mục</label>
                              <select class="form-control" name="parent_id">
                                  <option value="0">Chọn loại danh mục</option>
                                  {!! $htmlOption !!}
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="">Nội dung</label>
                              <textarea class="form-control tinymce_editor_init" name="content" rows="4"> </textarea>
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
  @section('js')
  <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="{{asset('admin_user/product/add/add.js')}}"></script>


  <script>
      $(function() {
          $(".tags_select").select2({
              tags: true,
              tokenSeparators: [',', ' ']
          })

      })
  </script>
  @endsection
