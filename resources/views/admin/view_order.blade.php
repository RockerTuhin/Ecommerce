@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">View Order</a></li>
			</ul>
<div class="row-fluid sortable">

<div class="box span4">
	<div class="box-header">
		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
	</div>
	<div class="box-content">
		<table class="table table-bordered">
			  <thead>
				  <tr>
					  <th>Customer Name</th>
					  <th>Mobile</th>                                         
				  </tr>
			  </thead>   
			  <tbody>
			  	@foreach($view_order as $item)
			  	@endforeach
				<tr>
					<td>{{$item->customer_name}}</td>
					<td class="center">{{$item->mobile_number}}</td>                                       
				</tr>                          
			  </tbody>
		 </table>  
		 <div class="pagination pagination-centered">
		  <ul>
			<li><a href="#">Prev</a></li>
			<li class="active">
			  <a href="#">1</a>
			</li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">Next</a></li>
		  </ul>
		</div>     
	</div>
</div><!--/span-->
	
<div class="box span8">
	<div class="box-header">
		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
	</div>
	<div class="box-content">
		<table class="table table-condensed">
			  <thead>
				  <tr>
					  <th>Name</th>
					  <th>Address</th>
					  <th>Mobile</th>
					  <th>Email</th>                                          
				  </tr>
			  </thead>   
			  <tbody>
			  	@foreach($view_order as $item)
			  	@endforeach
				<tr>
					<td>{{$item->shipping_first_name. $item->shipping_last_name}}</td>
					<td class="center">{{$item->shipping_address}}</td>
					<td class="center">{{$item->shipping_mobile_number}}</td>
					<td class="center">{{$item->shipping_email}}</td>                                       
				</tr>                             
			  </tbody>
		 </table>  
		 <div class="pagination pagination-centered">
		  <ul>
			<li><a href="#">Prev</a></li>
			<li class="active">
			  <a href="#">1</a>
			</li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">Next</a></li>
		  </ul>
		</div>     
	</div>
</div><!--/span-->

</div><!--/row-->

<div class="row-fluid sortable">	
	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
		</div>
		<div class="box-content">
			<table class="table table-bordered table-striped table-condensed">
				  <thead>
					  <tr>
						  <th>Order Id</th>
						  <th>Product Name</th>
						  <th>Product Price</th>
						  <th>Product Sales Quantity</th>
						  <th>Product Sub Total</th>                                             
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($view_order as $item)
					<tr>
						<td>{{$item->order_id}}</td>
						<td class="center">{{$item->product_name}}</td>
						<td class="center">{{$item->product_price}}</td>
						<td class="center">{{$item->product_sales_quantity}}</td> 
						<td class="center">{{$item->product_price*$item->product_sales_quantity}}</td>                                     
					</tr>
					@endforeach                             
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			  <ul>
				<li><a href="#">Prev</a></li>
				<li class="active">
				  <a href="#">1</a>
				</li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">Next</a></li>
			  </ul>
			</div>     
		</div>
	</div><!--/span-->
</div><!--/row-->
@endsection