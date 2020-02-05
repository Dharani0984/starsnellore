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
						<button class="btn btn-primary btn-xs" value="Update">Update Module</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>
					<div class="panel-body">
						
					
						<form method="post" action="{{ asset('update-service-modules') }}/{{$modules[0]->id}}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                              
                            
                          <div class="form-group row">
                            <label for="modules_title" class="col-md-4 col-form-label text-md-right">{{ __('Module Title') }}</label>
                            <div class="col-md-6">
                              <input id="modules_title" type="text" class="form-control @error('modules_title') is-invalid @enderror" name="modules_title" value="{{$modules[0]->modules_title}}"  autocomplete="modules_title" autofocus placeholder="Please Enter Modules Title">
                              @error('modules_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="modules_name" class="col-md-4 col-form-label text-md-right">{{ __('Menu Name') }}</label>
                            <div class="col-md-6">
                              <input id="modules_name" type="text" class="form-control @error('modules_name') is-invalid @enderror" name="modules_name" value="{{$modules[0]->modules_name}}"  autocomplete="modules_name" autofocus placeholder="Please Enter Module Name">
                              @error('modules_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="modules_description" class="col-md-4 col-form-label text-md-right">{{ __('Module Description') }}</label>
                            <div class="col-md-6">
                              <input id="modules_description" type="text" class="form-control @error('modules_description') is-invalid @enderror" name="modules_description" value="{{$modules[0]->modules_description}}"  autocomplete="modules_description" autofocus placeholder="Please Enter Module Description">
                              @error('modules_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="modules_url" class="col-md-4 col-form-label text-md-right">{{ __('Module Url') }}</label>
                            <div class="col-md-6">
                              <input id="modules_url" type="text" class="form-control @error('modules_url') is-invalid @enderror" name="modules_url" value="{{$modules[0]->modules_url}}"  autocomplete="modules_url" autofocus placeholder="Please Enter Menu Url">
                              @error('modules_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="modules_img" class="col-md-4 col-form-label text-md-right">{{ __('Module Image') }}</label>
                            <div class="col-md-6">
                              <input id="modules_img" type="file" class="form-control @error('modules_img') is-invalid @enderror" name="modules_img" value="{{$modules[0]->modules_img}}"  autocomplete="modules_img" autofocus placeholder="Please Enter Module Image">
                              @error('modules_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="modules_slug" class="col-md-4 col-form-label text-md-right">{{ __('Menu Slug') }}</label>
                            <div class="col-md-6">
                              <input id="modules_slug" type="text" class="form-control @error('modules_slug') is-invalid @enderror" name="modules_slug" value="{{$modules[0]->modules_slug}}"  autocomplete="menu_slug" autofocus placeholder="Please Enter Module slug">
                              @error('menu_slug')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-success btn-xs">
                              {{ __('Add Module') }}
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

