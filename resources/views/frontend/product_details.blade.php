@extends('frontend.layouts.master')


  @section('title','Shop | '.$product->name)

  @section('pagecss')
  <link href="{{asset('frontend/css/product_page.css')}}" rel="stylesheet">
  @endsection


  @section('content')

  <main>
    <div class="container margin_30">
      @if(empty($product->sale_price == null ))
        <div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div>
        </div>
      @endif

        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                          {{-- @foreach($product as $image) --}}
                            <div style="background-image: url('{{asset('backend/images/products/'.$product->product_image)}}');" class="item-box"></div>
                          {{-- @endforeach --}}
                          @foreach($product_grallery as $image)
                            <div style="background-image: url('{{asset('backend/images/product_gallery/'.$image->image)}}');" class="item-box"></div>
                            @endforeach
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <div style="background-image: url('{{asset('backend/images/products/'.$product->product_image)}}');" class="item active"></div>
                          @foreach($product_grallery as $image)
                           <div style="background-image: url('{{asset('backend/images/product_gallery/'.$image->image)}}');" class="item"></div>
                          @endforeach

                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>{{$product->category_id ? $product->category->title : "Uncategories"}}</li>
                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1>{{$product->name}}</h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                    <p>
                      <small>SKU: {{$product->product_code}}</small><br>
                      <small>{{$product->stock}}</small><br>
                      {!! $product->short_description !!}
                    </p>

                    <div class="prod_options">
                        {{-- <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                                <ul>
                                    <li><a href="#0" class="color color_1 active"></a></li>
                                    <li><a href="#0" class="color color_2"></a></li>
                                    <li><a href="#0" class="color color_3"></a></li>
                                    <li><a href="#0" class="color color_4"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="custom-select-form">
                                    <select class="wide">
                                        <option value="" selected>Small (S)</option>
                                        <option value="">M</option>
                                        <option value=" ">L</option>
                                        <option value=" ">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main">
                              @if(empty($product->sale_price == null ))
                              <span class="new_price">{{$product->sale_price}}</span><span class="percentage">%</span>
                              @endif
                              <span class="{{$product->sale_price ? 'old_price' : 'new_price'}}">${{$product->regular_price}}</span></div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart"><a href="#0" class="btn_1">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                Description
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    {!! $product->long_description !!}
                                </div>

                                <div class="col-lg-5">
                                    <h3>Specifications</h3>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                {{-- <tr>
                                                    <td><strong>Color</strong></td>
                                                    <td>Blue, Purple</td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <td><strong>Size</strong></td>
                                                    <td>150x100x100</td>
                                                </tr> --}}
                                                <tr>
                                                  @if(empty($product->weight))
                                                    <td><strong>Weight</strong></td>
                                                    <td>{{$product->weight ? $product->weight : ' '}}</td>
                                                  @endif
                                                </tr>
                                                <tr>
                                                    <td><strong>Manifacturer</strong></td>
                                                    <td>Manifacturer</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /table-responsive -->
                                </div>
                            </div>
                            @if($product_documents)
                                <div class="row">
                                    @foreach($product_documents as $document)
                                    <div class="col-4">
                                        <div class="col-lg-4 col-md-6">
                                        <div class="download"><a href="{{url('shop/download/'.$document->id)}}" class="btn_1">{{$document->document}}</a></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Reviews
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 54 minutes ago</em>
                                        </div>
                                        <h4>"Commpletely satisfied"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
                                            <em>Published 1 day ago</em>
                                        </div>
                                        <h4>"Always the best"</h4>
                                        <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
                                            <em>Published 3 days ago</em>
                                        </div>
                                        <h4>"Outstanding"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 4 days ago</em>
                                        </div>
                                        <h4>"Excellent"</h4>
                                        <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <p class="text-right"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Related</h2>
            <span>Products</span>
            {{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach($product_related as $p_related)
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon new">{{$product->category_id ? $product->category->title : "Uncategories"}}</span>
                        <figure>
                            <a href="{{url('shop/'.$p_related->slug)}}">
                        <img class="owl-lazy" src="{{asset('backend/images/products/'.$p_related->product_image)}}" style="height:200px; width:auto; margin:auto;" data-src="{{asset('backend/images/products/'.$p_related->product_image)}}" alt="">
                            </a>
                        </figure>
                        <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                        <a href="{{url('shop/'.$p_related->slug)}}">
                            <h3>{{$p_related->name}}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">${{$p_related->regular_price}}</span>
                        </div>
                        <ul>
                            <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
                            </li>
                            <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                            </li>
                            <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach

        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="feat">
    <div class="container">
      <ul>
        <li>
          <div class="box">
            <i class="ti-gift"></i>
            <div class="justify-content-center">
              <h3>Free Shipping</h3>
              <p>For all oders over $99</p>
            </div>
          </div>
        </li>
        <li>
          <div class="box">
            <i class="ti-wallet"></i>
            <div class="justify-content-center">
              <h3>Secure Payment</h3>
              <p>100% secure payment</p>
            </div>
          </div>
        </li>
        <li>
          <div class="box">
            <i class="ti-headphone-alt"></i>
            <div class="justify-content-center">
              <h3>24/7 Support</h3>
              <p>Online top support</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!--/feat-->

</main>

  @endsection



  @section('script')
  <script src="{{asset('frontend/js/carousel_with_thumbs.js')}}"></script>
  @endsection
