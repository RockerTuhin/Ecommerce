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
	<a href="#">Add Category</a>
</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
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
			<form class="form-horizontal" action="{{url('/save-category')}}" method="post">
				{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Category Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="category_name">
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Category Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="category_description"></textarea>
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="date02">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" id="date02" name="publication_status" value="1">
				  </div>
				</div>

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Category</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection