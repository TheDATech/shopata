@extends('admin.layouts.master')


@section('title','Edit Product')

  @section('pageheadlinks')
  <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}

  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
  {{-- <style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
      color: #444;
      line-height: 18px;
      margin-top: -9px;
      margin-left: -20px
    }
  </style> --}}
  @endsection

  @section('content')
    <div class="row">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Edit Product</h3>
                <form class="forms-sample" action="{{url('admin/product/'.$product->id)}}" method="POST" enctype="multipart/form-data" id="productadd">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="productname"><h5>Product Name</h5></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{$product->name}}">
                        @error('title')
                        <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug"><h5>slug</h5></label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{$product->slug}}" readonly>
                        @error('slug')
                          <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="slug"><h5>Product code</h5></label>
                      <input type="text" class="form-control" id="product_code" name="product_code" placeholder="product code" value="{{$product->product_code}}">
                    </div>

                    <div class="form-group" >
                      <label for="description"><h5>Descripton</h5></label>
                      <textarea type="text" class="form-control" id="description" rows="10" name="long_description" >{{$product->long_description}}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="shortdescription"><h5>Short Descripton</h5></label>
                      <textarea type="text" class="form-control" id="short_description" name="short_description">{{$product->short_description}}</textarea>
                    </div>

                    <div class="form-group">
                      <table>
                        <tbody>
                          @foreach ($product_documents as $document)
                            <tr>
                              <td>
                                  <input type="text" value="{{$document->document}}" name="document[]" readonly class="form-control">
                              </td>
                              <td>
                                  <button type="button" class="deletedocument deletedoc btn-sm btn-default form-control" data-id="{{url('admin/product/documentdelete/'.$document->id)}}" ><i style="color:red;" class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                              @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="form-group">
                      <table>
                        <tbody  class="new_document">

                        </tbody>
                      </table>
                    </div>
{{--
                    <div class="form-group">
                      <label for="document">Document Attach</label>
                      <input type="file" multiple="multiple" name="document[]" class="form-control document_name" id="document">

                    </div> --}}

                    <div class="form-group">
                        <button type="button" class="btn btn-info btn-sm" id="add-document">Add File</button>
                    </div>



                    {{-- seo tab --}}

                    <div class="form-group">
                      <div class="card" style="background-color: #f7f7f0">
                        <div class="card-header bg-info" role="tab" id="heading-13">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" href="#seo-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                              SEO
                            </a>
                          </h6>
                        </div>
                        <div id="seo-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                          <div class="card-body">
                            <div class="row">

                              <div class="form-group col-12">
                                <label for="metatitle">meta title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$product->meta_title}}"/>
                                @error('meta_title')
                                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                                @enderror
                              </div>

                              <div class="form-group col-12">
                                <label for="metadescription">meta Descripton</label>
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description">{{$product->meta_description}}</textarea>
                                @error('meta_description')
                                <p><small class="text-danger">{{ $errors->first('meta_description') }}</small></p>
                                @enderror
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- seo tab end--}}

                    {{-- general info --}}


                    <div class="form-group">
                        <div class="card" style="background-color: #f7f7f0">

                                <div class="card-header bg-info" role="tab" id="heading-13">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#genral-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                                        General
                                        </a>
                                    </h6>
                                </div>

                            <div id="genral-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="form-group col-6">
                                            <label for="quantity">Product Type</label>
                                            <select name="product_type" id="product_type" class="form-control">
                                                <option value="simple" {{$product->type == "simple" ? 'selected' : ''}}>Simple</option>
                                                <option value="digital" {{$product->type == "digital" ? 'selected' : ''}}>Digital Product</option>
                                                <option value="variable" {{$product->type == "variable" ? 'selected' : ''}}>Variable</option>
                                              </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="regular_price">Regular Price</label>
                                            <input type="number" step="0.02" class="form-control" id="regular_price" name="regular_price" placeholder="$0.00" value="{{$product->regular_price}}">
                                            @error('regular_price')
                                            <p><small class="text-danger">{{ $errors->first('regular_price') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="$0.00" value="{{$product->sale_price}}">
                                            @error('sale_price')
                                            <p><small class="text-danger">{{ $errors->first('sale_price') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{$product->quantity}}">
                                            @error('quantity')
                                            <p><small class="text-danger">{{ $errors->first('quantity') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="quantity">Stock</label>
                                            <select name="stock" id="stock" class="form-control">
                                                <option value="instock" {{$product->stock == "instock" ? 'selected' : ''}}>In stock</option>
                                                <option value="outstock" {{$product->stock == "outstock" ? 'selected' : ''}}>Out of stock</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="item_weight">Item Weight</label>
                                            <input type="text" class="form-control" id="item_weight" name="item_weight" placeholder="0.00 kg" value="{{$product->item_weight}}">
                                            @error('item_weight')
                                            <p><small class="text-danger">{{ $errors->first('item_weight') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="item_dimension">Item Dimension</label>
                                            <input type="text" class="form-control" id="item_dimension" name="item_dimension" placeholder=" " value="{{$product->item_dimension}}">
                                            @error('item_dimension')
                                            <p><small class="text-danger">{{ $errors->first('item_dimension') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6 ">
                                            <label for="tax_status">Tax status</label>
                                            <input type="text" class="form-control" id="tax_status" name="tax_status" placeholder=" " value="{{$product->tax_status}}">
                                            @error('tax_status')
                                            <p><small class="text-danger">{{ $errors->first('tax_status') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="tax_class">Tax Class</label>
                                            <input type="text" class="form-control" id="tax_class" name="tax_class" placeholder=" " value="{{$product->tax_class}}">
                                            @error('tax_class')
                                            <p><small class="text-danger">{{ $errors->first('tax_class') }}</small></p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                                                              {{-- variation --}}
                    {{-- <div class="form-group">
                      <div class="card" style="background-color: #f7f7f0">
                        <div class="card-header bg-primary" role="tab" id="heading-13">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" href="#variation-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                              Variation
                            </a>
                          </h6>
                        </div>
                        <div id="variation-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                          <div class="card-body">
                                  <div class="row">
                                    @if(!empty($variations))
                                    <div class="form-group col-6">
                                      <label for="quantity">Variation Name</label>
                                      <select name="variation" id="variation" class="form-control">
                                        <option value="" selected>Custom Variation</option>
                                        @foreach ($variations as $variation)
                                          <option value="{{$variation->id}}">{{$variation->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-12 ">
                                        <button type="button" class="btn btn-primary form-control">Add</button>
                                      </div>
                                    </div>
                                    @endif


                                  </div>


                          </div>
                        </div>
                      </div>
                    </div> --}}

              </div>
            </div>
        </div>


        <div class="col-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                              {{-- active or inactive --}}
                              <div class="form-group">
                                <label for="status">Draft</label>
                                <select name="status" class="form-control">
                                  <option value="publish" {{$product->status == 'publish' ? 'selected' : ''}} class="form-group">Publish</option>
                                  <option value="draft" {{$product->status == 'draft' ? 'selected' : ''}} class="form-group">Draft</option>
                                </select>
                              </div>

                                  {{-- product image --}}
                              <div class="form-group">

                                <div class="card">

                                    <div class="card-body">

                                      <h4 class="card-title">Product Image</h4>

                                      <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{$product->product_image ? asset('backend/images/products/'.$product->product_image) : ''}}"/>

                                    </div>

                                </div>

                              </div>
                                {{-- product image end --}}
                                <hr>
                                  {{-- product brand --}}
                                <div class="form-group">

                                  <label class="col-8 col-form-label">Brands</label>

                                  <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="AM">America</option>
                                        <option value="CA">Canada</option>
                                        <option value="RU">Russia</option>
                                      </select>
                                      {{-- <select class="js-example-basic-single w-100 select2-show-accessible" tabindex="-1" aria-hidden="true" name="brand_id">

                                      <option value="" selected>UnCategories</option>
                                      @foreach ($brand as $item)
                                        <option value="{{$item->id}}" {{ $item->id == $product->brand_id ? 'selected' : ''}}>{{$item->title}}</option>
                                      @endforeach

                                    </select> --}}

                                  </div>

                                </div>
                                  {{-- product brand end --}}
                                <hr>
                                {{-- product categories --}}
                                <div class="form-group">

                                  <label class="col-8 col-form-label">Categories</label>

                                  <div class="col-sm-9">

                                    <select class="form-control select2" name="category_id">

                                      <option value="" selected>UnCategories</option>

                                      @foreach ($category as $item)
                                        <option value="{{$item->id}}" {{ $product->category_id ==  $item->id ? 'selected' : '' }}>{{$item->title}}</option>

                                        @if (count($item->subcategory) > 0)
                                            @include('admin.product.layouts.editmulticategory',['subcategories' => $item->subcategory])
                                        @endif
                                      @endforeach

                                    </select>

                                  </div>

                                </div>

                                  {{-- product category end --}}
                                <hr>
                                  {{-- product grallery image --}}
                                  <div class="form-group">

                                    <label>Product Grallery</label>

                                    <div class="user-image mb-3 text-center">
                                      <div class="imgPreview"> </div>
                                    </div>


                                    <div class="form-group">

                                      <table class="table">

                                        <tbody>

                                          @foreach($product_grallery as $item)
                                            <tr>

                                                <td class="form-group">

                                                  <div class="form-group">
                                                    <img src="{{asset('backend/images/product_gallery/'.$item->image)}}" alt="" width="80px" height="auto"/>
                                                  </div>

                                                </td>

                                                <td>

                                                  <button type="button" class="deletegallery delete" data-id="{{url('admin/product/gallerydelete/'.$item->id)}}" ><i style="color:red;" class="fa fa-trash"></i></button>

                                                </td>

                                            </tr>

                                          @endforeach

                                        </tbody>

                                      </table>

                                    </div>

                                    <div class="form-group">

                                      <input type="file" name="gallery_image[]"  class="form-control"
                                      id="images" multiple="multiple" />

                                    </div>

                                    @error('gallery_image')
                                        <p><small class="text-danger">{{ $errors->first('gallery_image') }}</small></p>
                                    @enderror

                                  </div>
                                  {{-- product grallery image end--}}

            </div>

          </div>

        </div>

        <div class="col-2 form-group">
            <button type="submit" name="submit" class="col-12 btn btn-info mr-2"><i class="icon-refresh"></i>&nbsp;Update</button>
        </div>

      </form>

    </div>
  @endsection

@section('script')

    {{-- // multiple file document  --}}


            {{-- add product document --}}

                <script>

                    $('#add-document').on('click', function(){
                        var tr = '<tr>'+
                                // '<td style="padding-right:10px;"><input type="text" name="title[]" class="form-control" placeholder="Document Name"/></td>'+
                                '<td style="margin:10px"><input type="file" name="document[]" class="form-control"/></td>'+
                                '<td><button type="button" class="delete-row btn btn-default"><i style="color:red;" class="fa fa-trash"></i></button></td>'+
                                '</tr>';
                            $('.new_document').append(tr);
                    });

                    $('.new_document').on('click', '.delete-row', function(){
                        $(this).parent().parent().remove();
                    });

                </script>

            {{-- add product document end--}}

            {{-- delete product document --}}

                <script>
                    $(".deletedocument").click('.deletedoc',function(){

                        var dataId = $(this).attr("data-id");
                        var del = this;
                        // console.log(id);
                        // alert(dataId);

                        if(confirm("Do you really want to delete document?")){

                            $.ajax({
                            url:dataId,
                            type:'DELETE',
                            data:{
                                _token : $("input[name=_token]").val()

                                },
                            success:function(response){
                                $(del).closest( "tr" ).remove();
                                alert(response.success);
                            }
                            });

                        }
                        });
                </script>

            {{-- delete product document end--}}

    {{-- multiple file document  --}}

    {{-- multi image preview and delete --}}

        {{-- image garllery preview--}}

            <script>

                $(function() {
                    // Multiple images preview with JavaScript
                    var multiImgPreview = function(input, imgPreviewPlaceholder) {

                        if (input.files) {
                            var filesAmount = input.files.length;
                            // var filepath    = input.files.val();
                            // alert(filepath);

                            for (i = 0; i < filesAmount; i++) {
                                var reader = new FileReader();

                                reader.onload = function(event) {
                                    $($.parseHTML('<img width="80px" height="80px">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                                }

                                reader.readAsDataURL(input.files[i]);
                            }
                        }

                    };

                    $('#images').on('change', function() {
                        multiImgPreview(this, 'div.imgPreview');
                    });

                });

            </script>

        {{-- image garllery preview--}}

        {{-- delete gallery image --}}

            <script>

                $(".deletegallery").click('.delete',function(){

                    var dataId = $(this).attr("data-id");
                    var del = this;
                    // console.log(id);
                    // alert(dataId);
                    if(confirm("Do you really want to delete")){

                        $.ajax({
                            url:dataId,
                            type:'DELETE',
                            data:{
                            _token : $("input[name=_token]").val()

                            },
                            success:function(response){
                            $(del).closest( "tr" ).remove();
                            alert(response.success);
                            }
                        });

                    }
                });

            </script>

        {{-- delete gallery image end--}}

    {{-- multi image preview and delete end--}}


    {{-- slug --}}

        <script>
            $("#name").keyup(function(){
            var str = $(this).val();
            var trims = $.trim(str)
            var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
            $("#slug").val(slug.toLowerCase());
            });
        </script>

    {{-- slug end--}}

    {{-- ckeditor --}}
    <script>

        CKEDITOR.replace( 'description', {

        });


        CKEDITOR.replace( 'short_description', {

        });

    </script>

  {{-- for seraching dropdown seraching --}}

  <script>

    // $(".select2").select2();

    // $('#brand').select2({
    //     selectOnClose: true
    // });
    // $('#category').select2({
    //     selectOnClose: true
    // });

    <script src="{{asset('backend/js/select2.js')}}"></script>

  </script>

@endsection
