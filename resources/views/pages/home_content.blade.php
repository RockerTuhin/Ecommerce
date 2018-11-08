@extends('layout')

@section('slider')

<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <?php
                                $all_slider = DB::table('tbl_slider')
                                    ->where('publication_status',1)
                                    ->get();

                                foreach($all_slider as $all){
                                    $min = $all->slider_id;
                                }
                            ?>

                            @foreach($all_slider as $item)
                            <div class="item <?php if($item->slider_id == $min) {echo " active";}?>">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{URL::to($item->slider_image)}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('assets/images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->

@endsection

@section('content')
<h2 class="title text-center">Features Items</h2>
	@foreach($all_product_info as $item)
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
	                        <a href="{{URL::to('/detailis-of-product/'.$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                </div>
	        </div>
	        <div class="choose">
	            <ul class="nav nav-pills nav-justified">
	                <li><a href="#"><i class="fa fa-plus-square"></i>{{$item->brand_name}}</a></li>
	                <li><a href="{{URL::to('/detailis-of-product/'.$item->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
	            </ul>
	        </div>
	    </div>
	</div>
	@endforeach
	</div><!--features_items-->

	<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
	    <ul class="nav nav-tabs">
	        <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
	        <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
	        <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
	        <li><a href="#kids" data-toggle="tab">Kids</a></li>
	        <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
	    </ul>
	</div>
	<div class="tab-content">
	    <div class="tab-pane fade active in" id="tshirt" >
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery1.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery2.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery3.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery4.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	    
	    <div class="tab-pane fade" id="blazers" >
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery4.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery3.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery2.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery1.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	    
	    <div class="tab-pane fade" id="sunglass" >
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery3.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery4.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery1.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery2.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	    
	    <div class="tab-pane fade" id="kids" >
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery1.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery2.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery3.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery4.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	    
	    <div class="tab-pane fade" id="poloshirt" >
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery2.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery4.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery3.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-3">
	            <div class="product-image-wrapper">
	                <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{asset('assets/images/home/gallery1.jpg')}}" alt="" />
	                        <h2>$56</h2>
	                        <p>Easy Polo Black Edition</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	</div><!--/category-tab-->

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