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
					  <th>Category ID</th>
					  <th>Category Name</th>
					  <th>Category Description</th>
					  <th>Publication Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>  
			  @foreach($all_category_info as $item) 
			  <tbody>
				<tr>
					<td>{{$item->category_id}}</td>
					<td class="center">{{$item->category_name}}</td>
					<td class="center">{{$item->category_description}}</td>
					<td class="center">
						@if($item->publication_status == 1)
							<span class="label label-success">Publish</span>
						@else
							<span class="label label-danger">Unpublish</span>
						@endif
					</td>
					<td class="center">
						@if($item->publication_status == 1)
							<a class="btn btn-danger" href="{{URL::to('/unactive-category/'.$item->category_id)}}">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{URL::to('/active-category/'.$item->category_id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
						@endif
						<a class="btn btn-info" href="{{URL::to('/edit-category/'.$item->category_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete-category/'.$item->category_id)}}" id="delete">
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