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
						<button class="btn btn-primary btn-xs" value="Update">Update Submenu</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>
					<div class="panel-body">
						
						

						<form method="post" action="{{ asset('update_service_submenus') }}/{{$service_submenus[0]->id}}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                              <input id="menu_id" type="hidden" class="form-control @error('menu_id') is-invalid @enderror" name="menu_id" value="{{$service_submenus[0]->menu_id}}"  autocomplete="menu_id" autofocus placeholder="Please Enter service Id" readonly="true">
                             
                             <input id="menu_name" type="hidden" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value="{{$service_submenus[0]->id}}"  autocomplete="menu_name" autofocus placeholder="Please Enter Menu Name" readonly="true">

                            
                          <div class="form-group row">
                            <label for="submenu_title" class="col-md-4 col-form-label text-md-right">{{ __('submenu Title') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_title" type="text" class="form-control @error('submenu_title') is-invalid @enderror" name="submenu_title" value="{{$service_submenus[0]->submenu_title}}"  autocomplete="submenu_title" autofocus placeholder="Please Enter submenu Title">
                              @error('submenu_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="submenu_name" class="col-md-4 col-form-label text-md-right">{{ __('submenu Name') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_name" type="text" class="form-control @error('submenu_name') is-invalid @enderror" name="submenu_name" value="{{$service_submenus[0]->submenu_name}}"  autocomplete="submenu_name" autofocus placeholder="Please Enter submenu Name">
                              @error('submenu_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                           <div class="form-group row">
                            <label for="submenu_price" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Price') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_price" type="text" class="form-control @error('submenu_price') is-invalid @enderror" name="submenu_price" value="{{$service_submenus[0]->submenu_price}}"  autocomplete="submenu_price" autofocus placeholder="Please Enter submenu Name">
                              @error('submenu_price')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="submenu_description" class="col-md-4 col-form-label text-md-right">{{ __('submenu Description') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_description" type="text" class="form-control @error('submenu_description') is-invalid @enderror" name="submenu_description" value="{{$service_submenus[0]->submenu_description}}"  autocomplete="submenu_description" autofocus placeholder="Please Enter submenu Description">
                              @error('submenu_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="submenu_url" class="col-md-4 col-form-label text-md-right">{{ __('submenu Url') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_url" type="text" class="form-control @error('submenu_url') is-invalid @enderror" name="submenu_url" value="{{$service_submenus[0]->submenu_url}}"  autocomplete="submenu_url" autofocus placeholder="Please Enter submenu Url">
                              @error('submenu_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="submenu_img" class="col-md-4 col-form-label text-md-right">{{ __('submenu Image') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_img" type="file" class="form-control @error('submenu_img') is-invalid @enderror" name="submenu_img" value="{{$service_submenus[0]->submenu_img}}"  autocomplete="submenu_img" autofocus placeholder="Please Enter submenu Image">
                              <img src="{{ asset('/storage/app/uploads/') }}/{{$service_submenus[0]->submenu_img}}" alt="img" width="20%">
                              @error('submenu_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="submenu_slug" class="col-md-4 col-form-label text-md-right">{{ __('submenu Slug') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_slug" type="text" class="form-control @error('submenu_slug') is-invalid @enderror" name="submenu_slug" value="{{$service_submenus[0]->submenu_slug}}"  autocomplete="submenu_slug" autofocus placeholder="Please Enter submenu slug">
                              @error('submenu_slug')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-success btn-xs">
                              {{ __('update submenu') }}
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

