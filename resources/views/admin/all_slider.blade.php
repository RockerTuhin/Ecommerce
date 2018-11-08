@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
	<i class="icon-home"></i>
	<a href="index.html">Home</a> 
	<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>
	<p class="alert-success">
		<?php
			$msg = Session::get('message');
		?>
		@if($msg)
			{{$msg}}
			<?php
				Session::put('message',null);
			?>
		@endif
		
	</p>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Slider ID</th>
					  <th>Slider Image</th>
					  <th>Publication Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>  
			  @foreach($all_slider_info as $item) 
			  <tbody>
				<tr>
					<td>{{$item->slider_id}}</td>
					<td class="center">
						<img src="{{URL::to($item->slider_image)}}" style="height: 80px;width: 200px;">
					</td>
					<td class="center">
						@if($item->publication_status == 1)
							<span class="label label-success">Published</span>
						@else
							<span class="label label-danger">Unpublished</span>
						@endif
					</td>
					<td class="center">
						@if($item->publication_status == 1)
							<a class="btn btn-danger" href="{{URL::to('/unactive-slider/'.$item->slider_id)}}">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{URL::to('/active-slider/'.$item->slider_id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
						@endif
						<a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$item->slider_id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
			  </tbody>
			  @endforeach
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection