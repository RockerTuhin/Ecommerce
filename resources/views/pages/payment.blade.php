@extends('layout')
@section('content')

<section id="cart_items">
	<div class="container col-sm-12">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<?php 
					$contents = Cart::getContent();
					// echo "<pre>";
					// print_r($contents);
					// echo "</pre>";
					//echo $contents->quantity;
					//Cart::clear();
					//echo Cart::getContent()->$data['name'];
					//Cart::get($contents->id);
					//echo "Count: ".$contents->name;
					//echo $contents->name;
					//exit();
				?>
				<thead>
					<tr class="cart_menu">
						<td class="image">Image</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
			 		@foreach($contents as $item)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{URL::to($item->attributes->image)}}" height="80px" width="80px" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$item->name}}</a></h4>
						</td>
						<td class="cart_price">
							<p>{{$item->price}} TK</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{url('/update-cart')}}" method="post">
									{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$item->quantity}}" autocomplete="off" size="2">
									<input type="hidden" name="field_id" value="{{$item->id}}">
									<input type="submit" value="update" class="btn btn-sm btn-default">
								</form>
							</div>
						</td>
						<td class="cart_total">
							<?php $total = Cart::get($item->id)->getPriceSum(); ?>
							<p class="cart_total_price">{{$total}} TK</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-from-cart/'.$item->id)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
		<!-- 	<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
							
						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						
						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div> -->
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<?php 
							$subTotal = Cart::getSubTotal();
							$total = Cart::getTotal(); 
						?>
						<li>Cart Sub Total <span>{{$subTotal}} TK</span></li>
						<li>Eco Tax <span>$2</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>{{$total}} TK</span></li>
					</ul>
						<a class="btn btn-default update" href="">Update</a>
						<?php
                            $customer_id = Session::get('customer_id');
                        ?>
                        @if($customer_id != NULL)
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                        @else
                            <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
                        @endif
						<!-- <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a> -->
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

<section id="do_action">
	<div class="container">
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							<p class="text-center">Created with bootsrap button and using radio button</p>
					</div>
					<!-- <div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod active">
				            	<div class="method visa"></div>
				                <input type="radio" name="options" checked> 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="options"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="options">
				            </label>
				       <label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="options"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method ez-cash"></div>
				                <input type="radio" name="options"> 
				            </label> 
				         
				        </div>        
					</div>
					<div class="footerNavWrap clearfix">
						<div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> Done</div>
					</div> -->
					<form action="{{url('/order-place')}}" method="post">
						{{csrf_field()}}
						<input type="radio" name="payment_method" value="handcash"> Handcash<br>
						<input type="radio" name="payment_method" value="card"> Debit Card<br>
						<input type="radio" name="payment_method" value="paypal"> Paypal<br>
						<input type="submit" name="" value="Done">
					</form>
				</div>
	</div>
</section><!--/#do_action-->

@endsection