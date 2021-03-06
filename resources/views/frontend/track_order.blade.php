@extends('frontend.layouts.master')

@section('title','Track Order')
    
@section('pagecss')
    
@endsection

@section('content')
<main class="bg_gray">
  <div id="track_order">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-xl-7 col-lg-9">
          <img src="{{asset('frontend/img/track_order.svg')}}" alt="" class="img-fluid add_bottom_15" width="200" height="177">
          <p>Quick Tracking Order</p>
          <form>
            <div class="search_bar">
              <input type="text" class="form-control" placeholder="Invoice ID">
              <input type="submit" value="Search">
            </div>
          </form>
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /track_order -->
  
  <div class="bg_white">
  <div class="container margin_60_35">
    <div class="main_title">
      <h2>New Entries</h2>
      <span>Products</span>
      <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel owl-loaded owl-drag">
      
      <!-- /item -->
      
      <!-- /item -->
      
      <!-- /item -->
      
      <!-- /item -->
      
      <!-- /item -->
    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1500px;"><div class="owl-item active" style="width: 290px; margin-right: 10px;"><div class="item">
        <div class="grid_item">
          <span class="ribbon new">New</span>
          <figure>
            <a href="product-detail-1.html">
              <img class="img-fluid lazy loaded" src="{{asset('frontend/img/products/p1.jpg')}}" data-src="frontend/img/products/p1.jpg" alt="" data-was-processed="true">
            </a>
          </figure>
          <a href="product-detail-1.html">
            <h3>ACG React Terra</h3>
          </a>
          <div class="price_box">
            <span class="new_price">$110.00</span>
          </div>
          <ul>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
          </ul>
        </div>
        <!-- /grid_item -->
      </div></div><div class="owl-item active" style="width: 290px; margin-right: 10px;"><div class="item">
        <div class="grid_item">
          <span class="ribbon new">New</span>
          <figure>
            <a href="product-detail-1.html">
              <img class="img-fluid lazy loaded" src="{{asset('frontend/img/products/p2.jpg')}}" data-src="frontend/img/products/p2.jpg" alt="" data-was-processed="true">
            </a>
          </figure>
          <a href="product-detail-1.html">
            <h3>Air Zoom Alpha</h3>
          </a>
          <div class="price_box">
            <span class="new_price">$140.00</span>
          </div>
          <ul>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
          </ul>
        </div>
        <!-- /grid_item -->
      </div></div><div class="owl-item active" style="width: 290px; margin-right: 10px;"><div class="item">
        <div class="grid_item">
          <span class="ribbon hot">Hot</span>
          <figure>
            <a href="product-detail-1.html">
              <img class="img-fluid lazy loaded" src="{{asset('frontend/img/products/p3.jpg')}}" data-src="frontend/img/products/p3.jpg" alt="" data-was-processed="true">
            </a>
          </figure>
          <a href="product-detail-1.html">
            <h3>Air Color 720</h3>
          </a>
          <div class="price_box">
            <span class="new_price">$120.00</span>
          </div>
          <ul>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
          </ul>
        </div>
        <!-- /grid_item -->
      </div></div><div class="owl-item active" style="width: 290px; margin-right: 10px;"><div class="item">
        <div class="grid_item">
          <span class="ribbon off">-30%</span>
          <figure>
            <a href="product-detail-1.html">
              <img class="img-fluid lazy loaded" src="{{asset('frontend/img/products/p4.jpg')}}" data-src="frontend/img/products/p4.jpg" alt="" data-was-processed="true">
            </a>
          </figure>
          <a href="product-detail-1.html">
            <h3>Okwahn II</h3>
          </a>
          <div class="price_box">
            <span class="new_price">$90.00</span>
            <span class="old_price">$170.00</span>
          </div>
          <ul>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
          </ul>
        </div>
        <!-- /grid_item -->
      </div></div><div class="owl-item" style="width: 290px; margin-right: 10px;"><div class="item">
        <div class="grid_item">
          <span class="ribbon off">-50%</span>
          <figure>
            <a href="product-detail-1.html">
              <img class="img-fluid lazy" src="{{asset('frontend/img/products/product_placeholder_square_medium.jpg')}}" data-src="img/products/p5.png" alt="">
            </a>
          </figure>
          <a href="product-detail-1.html">
            <h3>Air Wildwood ACG</h3>
          </a>
          <div class="price_box">
            <span class="new_price">$75.00</span>
            <span class="old_price">$155.00</span>
          </div>
          <ul>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
          </ul>
        </div>
        <!-- /grid_item -->
      </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="ti-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="ti-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
    <!-- /products_carousel -->
  </div>
  <!-- /container -->
  </div>
  <!-- /bg_white -->
</main>
@endsection