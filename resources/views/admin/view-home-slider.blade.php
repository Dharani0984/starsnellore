@include('admin.header');
<style>
	th, td, img {
		border: none;
		margin: -2px;
		width: 30%;
		height: 15%;
		padding:2px;
		border-width:0;
		text-align: center;
	}
	.img-info{
		width: 30%;
		height: 138px;
	}
	.btn-right{
    margin-right: -1px;
    float: right;
	}
</style>
<div id="page-wrapper">
	<div class="main-page">
		<div class="row-one widgettable">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-primary btn-xs" value="Update">Home Gallery</button>	
					<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>

					<div class="panel-body">
						<table class="table table-bordered" cellspacing="10"><tbody>
							@foreach($slider_data as $details)  
							<tr>
								<td>Id</td>
								<td>{{$details->id}}</td>
							</tr>
							<tr>
								<td>Image Title</td>
								<td>{{$details->slider_title}}</td>
							</tr>
							<tr>
								<td>Image Name</td>
								<td>{{$details->slider_name}}</td>
							</tr>
							<tr>
								<td>Image Description</td>
								<td>{{$details->slider_description}}</td>
							</tr>
							<tr>
								<td>Image Url</td>
								<td>{{$details->slider_url}}</td>
							</tr>
							<tr>
								<td>Image</td>
								<td><img class="img-info" src="{{url('storage/app/uploads')}}/{{$details->slider_img}}" alt="image"/></td>
							</tr>
							<tr>
								<td>image Slug</td>
								<td>{{$details->slider_slag}}</td>
							</tr>
							<tr>
								<td>Crate Time</td>
								<td>{{$details->created_at}}</td>
							</tr>
							<tr>
								<td>Updated Time</td>
								<td>{{$details->updated_at}}</td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@include('admin.footer');

<script>
function goBack() {
  window.history.go(-1);
}
</script>
