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
						<button class="btn btn-primary btn-xs" value="Update">Update Menu</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>
					<div class="panel-body">
						
						
						<form method="post" action="{{ asset('update_service_menus') }}/{{$service_menus[0]->id}}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                              <input id="service_id" type="hidden" class="form-control @error('service_id') is-invalid @enderror" name="service_id" value="{{$service_menus[0]->service_id}}"  autocomplete="service_id" autofocus placeholder="Please Enter service Id" readonly="true">
                             
                             <input id="service_name" type="hidden" class="form-control @error('service_name') is-invalid @enderror" name="service_name" value="{{$service_menus[0]->service_name}}"  autocomplete="service_name" autofocus placeholder="Please Enter Service Name" readonly="true">

                            
                          <div class="form-group row">
                            <label for="menu_title" class="col-md-4 col-form-label text-md-right">{{ __('Menu Title') }}</label>
                            <div class="col-md-6">
                              <input id="menu_title" type="text" class="form-control @error('menu_title') is-invalid @enderror" name="menu_title" value="{{$service_menus[0]->menu_title}}"  autocomplete="menu_title" autofocus placeholder="Please Enter Menu Title">
                              @error('menu_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_name" class="col-md-4 col-form-label text-md-right">{{ __('Menu Name') }}</label>
                            <div class="col-md-6">
                              <input id="menu_name" type="text" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value="{{$service_menus[0]->menu_name}}"  autocomplete="menu_name" autofocus placeholder="Please Enter Menu Name">
                              @error('menu_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_description" class="col-md-4 col-form-label text-md-right">{{ __('Menu Description') }}</label>
                            <div class="col-md-6">
                              <input id="menu_description" type="text" class="form-control @error('menu_description') is-invalid @enderror" name="menu_description" value="{{$service_menus[0]->menu_description}}"  autocomplete="menu_description" autofocus placeholder="Please Enter Menu Description">
                              @error('menu_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_url" class="col-md-4 col-form-label text-md-right">{{ __('Menu Url') }}</label>
                            <div class="col-md-6">
                              <input id="menu_url" type="text" class="form-control @error('menu_url') is-invalid @enderror" name="menu_url" value="{{$service_menus[0]->menu_url}}"  autocomplete="menu_url" autofocus placeholder="Please Enter Menu Url">
                              @error('menu_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_img" class="col-md-4 col-form-label text-md-right">{{ __('Menu Image') }}</label>
                            <div class="col-md-6">
                              <input id="menu_img" type="file" class="form-control @error('menu_img') is-invalid @enderror" name="menu_img" value="{{$service_menus[0]->menu_img}}"  autocomplete="menu_img" autofocus placeholder="Please Enter Menu Image">
                              <img src="{{ asset('/storage/app/uploads/') }}/{{$service_menus[0]->menu_img}}" alt="img" width="20%">
                              @error('menu_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_slug" class="col-md-4 col-form-label text-md-right">{{ __('Menu Slug') }}</label>
                            <div class="col-md-6">
                              <input id="menu_slug" type="text" class="form-control @error('menu_slug') is-invalid @enderror" name="menu_slug" value="{{$service_menus[0]->menu_slug}}"  autocomplete="menu_slug" autofocus placeholder="Please Enter Menu slug">
                              @error('menu_slug')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-success btn-xs">
                              {{ __('update Menu') }}
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

