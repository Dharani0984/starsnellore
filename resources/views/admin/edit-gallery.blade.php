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
			<!-- Update Image Model Popup -->
			
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-primary btn-xs" value="Update">Update Gallery</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>
					<div class="panel-body">
						@foreach($gallery_single_data as $details) 
						<form method="post" action="{{ asset('/edit-homegallery') }}/{{$details->id}}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
							<div class="form-group row"><label for="gallery_title" class="col-md-4 col-form-label text-md-right">{{ __('Image Title') }}</label>
								<div class="col-md-6">
									<input id="image_title" type="text" class="form-control @error('image_title') is-invalid @enderror" name="image_title" value="{{$details->image_title}}"  autocomplete="image_title" autofocus placeholder="Please Enter Image Title">
									@error('image_title')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="image_name" class="col-md-4 col-form-label text-md-right">{{ __('Image Name') }}</label>
								<div class="col-md-6">
									<input id="image_name" type="text" class="form-control @error('image_name') is-invalid @enderror" name="image_name" value="{{$details->image_name}}"  autocomplete="image_name" autofocus placeholder="Please Enter Image Name">
									@error('image_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="image_description" class="col-md-4 col-form-label text-md-right">{{ __('Image Description') }}</label>
								<div class="col-md-6">
									<input id="image_description" type="text" class="form-control @error('image_description') is-invalid @enderror" name="image_description" value="{{$details->image_description}}"  autocomplete="image_description" autofocus placeholder="Please Enter Image Description">
									@error('image_description')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>
								<div class="col-md-6">
									<input id="image_url" type="text" class="form-control @error('image_url') is-invalid @enderror" name="image_url" value="{{$details->image_url}}"  autocomplete="image_url" autofocus placeholder="Please Enter Image Url">
									@error('image_url')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								
							</div>
							<div class="form-group row">
								<label for="gallery_image" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Image') }}</label>
								<div class="col-md-6">
									<input id="gallery_image" type="file" class="form-control @error('gallery_image') is-invalid @enderror" name="gallery_image" value="{{ old('gallery_image') }}"  autocomplete="gallery_image" autofocus placeholder="Please Enter Gallery Name">
									@error('gallery_image')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<img class="img-info" src="{{url('storage/app/uploads')}}/{{$details->gallery_image}}"alt="image"/>
								</div>
							</div>
							<div class="form-group row">
								<label for="image_sub_name" class="col-md-4 col-form-label text-md-right">{{ __('Image Sub Name') }}</label>
								<div class="col-md-6">
									<input id="image_sub_name" type="text" class="form-control @error('image_sub_name') is-invalid @enderror" name="image_sub_name" value="{{$details->image_sub_name}}"  autocomplete="image_sub_name" autofocus placeholder="Please Enter Gallery Name">
									@error('image_sub_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="image_sub_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Sub Url') }}</label>
								<div class="col-md-6">
									<input id="image_sub_url" type="text" class="form-control @error('image_sub_url') is-invalid @enderror" name="image_sub_url" value="{{$details->image_sub_url}}"  autocomplete="image_sub_url" autofocus placeholder="Please Enter Image Url">
									@error('image_sub_url')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="gallery_sub_img" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Sub imag') }}</label>
								<div class="col-md-6">
									<input id="gallery_sub_img" type="file" class="form-control @error('gallery_sub_img') is-invalid @enderror" name="gallery_sub_img" value="{{ old('gallery_sub_img') }}"  autocomplete="gallery_sub_img" autofocus placeholder="Please Enter Gallery Sub Image">
									@error('gallery_sub_img')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

								</div>
							</div>

							<div class="form-group row">
								<label for="image_slag" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Slug Name') }}</label>
								<div class="col-md-6">
									<input id="image_slag" type="text" class="form-control @error('image_slag') is-invalid @enderror" name="image_slag" value="{{$details->image_slag}}"  autocomplete="image_slag" autofocus placeholder="Please Enter image Slugname">
									@error('image_slag')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<img class="img-info" src="{{url('storage/app/uploads')}}/{{$details->gallery_sub_img}}"alt="Noimage"/>
								</div>
							</div>

							<div class="form-group input_size">
								<button type="update" class="btn btn-primary btn-xs">
									{{ __('Update') }}
								</button>
							</div>
						</form>
						@endforeach
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

