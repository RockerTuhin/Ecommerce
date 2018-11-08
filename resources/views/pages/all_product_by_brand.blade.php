@extends('layout')
@section('content')

<h2 class="title text-center">Features Items</h2>
	@foreach($all_product_by_brand_info as $item)
	<div class="col-sm-4">
	    <div class="product-image-wrapper">
	        <div class="single-products">
	                <div class="productinfo text-center">
	                    <img src="{{URL::to($item->product_image)}}" style="height: 255.5px;" alt="" />
	                    <h2>{{$item->product_price}} TK</h2>
	                    <p>{{$item->product_name}}</p>
	                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                </div>
	                <div class="product-overlay">
	                    <div class="overlay-content">
	                        <h2>{{$item->product_price}} TK</h2>
	                        <p>{{$item->product_name}}</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                </div>
	        </div>
	        <div class="choose">
	            <ul class="nav nav-pills nav-justified">
	                <li><a href="#"><i class="fa fa-plus-square"></i>{{$item->brand_name}}</a></li>
	                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
	            </ul>
	        </div>
	    </div>
	</div>
	@endforeach
	</div><!--features_items-->

	

	<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
	    <div class="carousel-inner">
	        <div class="item active">   
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{asset('assets/images/home/recommend1.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{asset('assets/images/home/recommend2.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{asset('assets/images/home/recommend3.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="item">  
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{asset('assets/images/home/recommend1.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{asset('assets/images/home/recommend2.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{asset('assets/images/home/recommend3.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	     <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
	        <i class="fa fa-angle-left"></i>
	      </a>
	      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
	        <i class="fa fa-angle-right"></i>
	      </a>          
	</div>
</div><!--/recommended_items-->

@endsection