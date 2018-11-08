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
	<a href="#">Add Slider</a>
</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
		</div>
		<div class="box-content">
			<p class="alert-danger" style="text-align: center;">
			<?php
				$msg = Session::get('message');
				if($msg) {
					echo $msg;
					Session::put('message',NULL);
				}
			?>
			</p>
			<form class="form-horizontal" action="{{url('save-slider')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
			  <fieldset>
				
				<div class="control-group">
					<label class="control-label">Slider Image</label>
					<div class="controls">
					  <input type="file" name="slider_image" required="">
					</div>
				</div>
				
				<div class="control-group hidden-phone">
				  <label class="control-label" for="date02">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" id="date02" name="publication_status" value="1" required="">
				  </div>
				</div>

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Slider</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>

			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection