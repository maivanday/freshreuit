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
      @include('part.content-header',['name'=>'Product','key'=>'Edit'])


      <!--  content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6">

                      <form action="{{route('product.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="">Tên sản phẩm</label>
                              <input type="text " class="form-control" placeholder="Nhập tên danh mục" name="name" value="{{$product->name}}">

                          </div>
                          <div class="form-group">
                              <label for="">Giá sản phẩm</label>
                              <input type="text " class="form-control" placeholder="Nhập gia san pham" name="price" value="{{$product  ->price}}">
                          </div>

                          <div class="form-group">
                              <label for="">Ảnh sản phẩm</label>
                              <input type="file" class="form-control-file" name="feature_img_path">
                              <div class="col-md-4 container_img_detail">
                                  <div class="row">
                                      <img class="feature_img" src="{{$product->feature_image_path}}" alt="">
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="">Ảnh chi tiết</label>
                              <input type="file" class="form-control-file" name="image_path[]" multiple>
                              <div class="col-md-12 container_img_detail">
                                  <div class="row">
                                      @foreach ($product->productImage as $productImageItem)
                                      <div class="col-md-3">
                                          <img class="img_detail" src="{{$productImageItem->image_path}}" alt="">
                                      </div>
                                      @endforeach
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <label for="">Nhập tag</label>
                              <select class="form-control tags_select" multiple="multiple" name="tags[]">
                                  @foreach($product->tags as $tagItem)
                                  <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                  @endforeach

                              </select>
                          </div>

                          <div class="form-group">
                              <label for="">Chọn loại danh mục</label>
                              <select class="form-control" name="category_id">
                                  <option value="0">Chọn loại danh mục</option>
                                  {!! $htmlOption !!}
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="">Nội dung</label>
                              <textarea class="form-control " name="contents" rows="4">{{$product->content}} </textarea>
                          </div>




                          <button type=" submit" class="btn btn-primary">Submit</button>
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
  <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
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
