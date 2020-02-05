@include('admin.header');
<div id="page-wrapper">
	<div class="main-page">
		<div class="row-one widgettable">
			<!-- Update Image Model Popup -->
			
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-primary btn-xs" value="Update">Update Home Slider</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" style="float: right" value="Update">Back</button>
					</div>
					<div class="panel-body">
						@foreach($bg_images as $slider) 
						<form method="post" action="{{ asset('/update-home-slider') }}/{{$slider->id}}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
							<div class="form-group row"><label for="gallery_title" class="col-md-4 col-form-label text-md-right">{{ __('Image Title') }}</label>
								<div class="col-md-6">
									<input id="slider_title" type="text" class="form-control @error('slider_title') is-invalid @enderror" name="slider_title" value="{{$slider->slider_title}}"  autocomplete="slider_title" autofocus placeholder="Please Enter Image Title">
									@error('slider_title')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="slider_name" class="col-md-4 col-form-label text-md-right">{{ __('Image Name') }}</label>
								<div class="col-md-6">
									<input id="slider_name" type="text" class="form-control @error('slider_name') is-invalid @enderror" name="slider_name" value="{{$slider->slider_name}}"  autocomplete="slider_name" autofocus placeholder="Please Enter Image Name">
									@error('slider_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="slider_description" class="col-md-4 col-form-label text-md-right">{{ __('Image Description') }}</label>
								<div class="col-md-6">
									<input id="slider_description" type="text" class="form-control @error('slider_description') is-invalid @enderror" name="slider_description" value="{{$slider->slider_description}}"  autocomplete="slider_description" autofocus placeholder="Please Enter Image Description">
									@error('slider_description')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="slider_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>
								<div class="col-md-6">
									<input id="slider_url" type="text" class="form-control @error('slider_url') is-invalid @enderror" name="slider_url" value="{{$slider->slider_url}}"  autocomplete="slider_url" autofocus placeholder="Please Enter Image Url">
									@error('slider_url')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								
							</div>
							<div class="form-group row">
								<label for="slider_img" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Image') }}</label>
								<div class="col-md-6">
									<input id="slider_img" type="file" class="form-control @error('slider_img') is-invalid @enderror" name="slider_img" value="{{$slider->slider_img}}"  autocomplete="slider_img" autofocus placeholder="Please Enter Gallery Name">{{$slider->slider_img}}
									@error('slider_img')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<img class="img-info" src="{{url('storage/app/uploads')}}/{{$slider->slider_img}}"alt="image"/>
								</div>
							</div>
							<div class="form-group row">
								<label for="slider_slug" class="col-md-4 col-form-label text-md-right">{{ __('Image Sub Url') }}</label>
								<div class="col-md-6">
									<input id="slider_slug" type="text" class="form-control @error('slider_slug') is-invalid @enderror" name="slider_slug" value="{{$slider->slider_slug}}"  autocomplete="slider_slug" autofocus placeholder="Please Enter Image Url">
									@error('slider_slug')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
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

