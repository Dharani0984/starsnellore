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
						<button class="btn btn-primary btn-xs" value="Update">Update Label Menu</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>
					<div class="panel-body">
						
					      
					       
                 @if(!empty($labels_menus))
                         <form method="post" action="{{ asset('update-label_menu') }}/{{$labels_menus[0]->id}}" enctype="multipart/form-data">
                           @else
                           <form method="post" action="{{ asset('update-label_menu') }}" enctype="multipart/form-data">                     
                            @endif
                            @csrf
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                             @if(!$labels_menus->isEmpty())
                            <input id="labels_id" type="hidden" class="form-control @error('labels_id') is-invalid @enderror" name="labels_id" value="{{$labels_menus[0]->id}}"  autocomplete="labels_id" autofocus placeholder="Please Label menu Module Id">

                            <input id="labels_title" type="hidden" class="form-control @error('labels_title') is-invalid @enderror" name="labels_title" value="{{$labels_menus[0]->labels_title}}"  autocomplete="labels_title" autofocus placeholder="Please Enter Serice Title">
                           @endif

                            
                            <div class="form-group row">
                              <label for="labels_menu_title" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Title') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_title" type="text" class="form-control @error('labels_menu_title') is-invalid @enderror" name="labels_menu_title" value="{{$labels_menus[0]->labels_menu_title}}"  autocomplete="labels_menu_title" autofocus placeholder="Please Enter Laebel menu Title">
                                @error('labels_menu_title')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            

                            <div class="form-group row">
                              <label for="labels_menu_description" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Description') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_description" type="text" class="form-control @error('labels_menu_description') is-invalid @enderror" name="labels_menu_description" value="{{$labels_menus[0]->labels_menu_description}}"  autocomplete="labels_menu_description" autofocus placeholder="Please Enter Label menu Description">
                                @error('labels_menu_description')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="labels_menu_url" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Url') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_url" type="text" class="form-control @error('labels_menu_url') is-invalid @enderror" name="labels_menu_url" value="{{$labels_menus[0]->labels_menu_url}}"  autocomplete="labels_menu_url" autofocus placeholder="Please Enter Laebel menu Url">
                                @error('labels_menu_url')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="labels_menu_img" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Image') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_img" type="file" class="form-control @error('labels_menu_img') is-invalid @enderror" name="labels_menu_img" value="{{$labels_menus[0]->labels_menu_img}}"  autocomplete="labels_menu_img" autofocus placeholder="Please Enter Module Image">
                                @error('labels_menu_img')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="labels_menu_slug" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Slug') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_slug" type="text" class="form-control @error('labels_menu_slug') is-invalid @enderror" name="labels_menu_slug" value="{{$labels_menus[0]->labels_menu_slug}}"  autocomplete="labels_menu_slug" autofocus placeholder="Please Enter Label menu slug">
                                @error('labels_menu_slug')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group input_size">
                              <button type="submit" class="btn btn-success btn-xs">
                                {{ __('Update Label menu') }}
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

