@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
<li>
	<i class="icon-home"></i>
	<a href="index.html">Home</a>
	<i class="icon-angle-right"></i> 
</li>
<li>
	<i class="icon-edit"></i>
	<a href="#">Edit Product</a>
</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
		</div>
		<div class="box-content">

			<form class="form-horizontal" action="{{url('/update-product',$single_product_info->product_id)}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Product Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="product_name" value="{{$single_product_info->product_name}}">
				  </div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selectError3">Product-Category</label>
					<div class="controls">
					  <select id="selectError3" name="category_id">
						<option>Select Category</option>
					  	<?php
					  		$all_published_category = DB::table('tbl_category')
					  			->where('publication_status',1)
					  			->get();
					  	?>
					  	@foreach($all_published_category as $item)
						<option value="{{$item->category_id}}">{{$item->category_name}}</option>
						@endforeach
					  </select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selectError3">Product-Brand</label>
					<div class="controls">
					  <select id="selectError3" name="brand_id">
					  	<option>Select Brand</option>
						<?php
					  		$all_published_brand = DB::table('tbl_brands')
					  			->where('publication_status',1)
					  			->get();
					  	?>
					  	@foreach($all_published_brand as $item)
						<option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
						@endforeach
					  </select>
					</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Short Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="product_short_description">
						{{$single_product_info->product_short_description}}
					</textarea>
				  </div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Long Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="product_long_description">
						{{$single_product_info->product_long_description}}
					</textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="date01">Product Price</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="product_price" value="{{$single_product_info->product_price}}">
				  </div>
				</div>
				<div class="control-group">
					<label class="control-label">Product Image</label>
					<div class="controls">
					  <input type="file" name="product_image" value="{{$single_product_info->product_image}}">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="date01">Product Size</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="date01" name="product_size" value="{{$single_product_info->product_size}}">
					</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="date01">Product Color</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="product_color" value="{{$single_product_info->product_color}}">
				  </div>
				</div>
			
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save Product</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection