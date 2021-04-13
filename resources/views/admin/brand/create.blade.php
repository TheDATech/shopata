@extends('admin.layouts.master')

@section('title','Brand Add')


@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Brand Add</h4>
      <form class="forms-sample" action="{{url('admin/brand')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="card-body col-8">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Brand Name" value="{{old('title')}}" autofocus required>
                @error('title')
                    <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                @enderror
              </div>

              {{-- <div class="form-group">
                <label for="title">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('title')}}" readonly>
                @error('title')
                <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                @enderror
              </div> --}}

              <div class="form-group ">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" rows="5">{{old('description')}}</textarea>
              </div>

              <div class="form-group">
                <label for="title">meta title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta title" value="{{old('meta_title')}}">
                @error('meta_title')
                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="title">meta keyword</label>
                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="meta keyword" value="{{old('meta_keyword')}}">
                @error('meta_keyword')
                <p><small class="text-danger">{{ $errors->first('meta_keyword') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="title">meta description</label>
                <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="meta description" rows=5 >{{old('meta_description')}}</textarea>
                @error('meta_description')
                <p><small class="text-danger">{{ $errors->first('meta_description') }}</small></p>
                @enderror
              </div>
        </div>

        <div class="col-4">
          <div class="form-group ">

            <div class="form-group">
              <label>Brand Image</label>
              <div style="width:200px; border:1px solid #d9dee4;">
                  <img style="max-width:200px;max-height:200px;
                  display:block;" class="for-image" src="https://via.placeholder.com/200x200?text=200+x+200"/>
                  <button type="button" style="background:#d9dee4; border-radius:0px;width:200px;cursor:pointer;font-size:12px;font-weight:600;" class="upload-button btn btn-default"><i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                  <input style="display:none;" class="file-upload" type="file" name="image" accept="image/*"/>
              </div>
              @error('image')
                  <p><small class="text-danger">{{ $errors->first('image') }}</small></p>
              @enderror
            </div>

          </div>
        </div>
      </div>
        <div class="col-2 form-group">
            <button type="submit" class="col-12 btn btn-info btn-fw"><i class="icon-plus"></i>&nbsp;Submit</button>
        </div>
      {{-- <button type="submit" class="btn btn-info mr-2"> Submit</button> --}}
    </form>
  </div>
</div>

@endsection


@section('script')
    <script>
      // image show in div
      $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.for-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
           $(".file-upload").click();
        });


      });

    </script>
@endsection
