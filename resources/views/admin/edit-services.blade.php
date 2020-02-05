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
						<button class="btn btn-primary btn-xs" value="Update">update service</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>
					<div class="panel-body">
						
					
						<form method="post" action="{{ asset('update-services') }}/{{$services[0]->id}}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                              
                            
                          <div class="form-group row">
                            <label for="service_title" class="col-md-4 col-form-label text-md-right">{{ __('Sercice Title') }}</label>
                            <div class="col-md-6">
                              <input id="service_title" type="text" class="form-control @error('service_title') is-invalid @enderror" name="service_title" value="{{$services[0]->service_title}}"  autocomplete="service_title" autofocus placeholder="Please Enter service Title">
                              @error('service_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_name" class="col-md-4 col-form-label text-md-right">{{ __('Sercice Name') }}</label>
                            <div class="col-md-6">
                              <input id="service_name" type="text" class="form-control @error('service_name') is-invalid @enderror" name="service_name" value="{{$services[0]->service_name}}"  autocomplete="service_name" autofocus placeholder="Please Enter Module Name">
                              @error('service_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_description" class="col-md-4 col-form-label text-md-right">{{ __('Sercice Description') }}</label>
                            <div class="col-md-6">
                              <input id="service_description" type="text" class="form-control @error('service_description') is-invalid @enderror" name="service_description" value="{{$services[0]->service_description}}"  autocomplete="service_description" autofocus placeholder="Please Enter Module Description">
                              @error('service_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_url" class="col-md-4 col-form-label text-md-right">{{ __('Sercice Url') }}</label>
                            <div class="col-md-6">
                              <input id="service_url" type="text" class="form-control @error('service_url') is-invalid @enderror" name="service_url" value="{{$services[0]->service_url}}"  autocomplete="service_url" autofocus placeholder="Please Enter Menu Url">
                              @error('service_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_img" class="col-md-4 col-form-label text-md-right">{{ __('Sercice Image') }}</label>
                            <div class="col-md-6">
                              <input id="service_img" type="file" class="form-control @error('service_img') is-invalid @enderror" name="service_img" value="{{$services[0]->service_img}}"  autocomplete="service_img" autofocus placeholder="Please Enter Module Image">
                              <img  src="../storage/app/uploads/{{$services[0]->service_img}}" class="img-thumbnail" width="90px" height="90px" alt="" >
                              @error('service_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_slug" class="col-md-4 col-form-label text-md-right">{{ __('Sercice Slug') }}</label>
                            <div class="col-md-6">
                              <input id="service_slug" type="text" class="form-control @error('service_slug') is-invalid @enderror" name="service_slug" value="{{$services[0]->service_slug}}"  autocomplete="menu_slug" autofocus placeholder="Please Enter Module slug">
                              @error('menu_slug')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-success btn-xs">
                              {{ __('update service') }}
                            </button>
                          </div>
                        </form>
          
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

