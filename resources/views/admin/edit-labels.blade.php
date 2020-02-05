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
						<button class="btn btn-primary btn-xs" value="Update">Update Label</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
					</div>
					<div class="panel-body">
						
					
					
                  @if(!empty($labels))
                        <form method="post" action="{{ asset('update-labels') }}/{{$labels[0]->id}}" enctype="multipart/form-data">
                       @else
                        <form method="post" action="{{ asset('update-labels') }}" enctype="multipart/form-data">                     
                        @endif
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                              
                            
                          <div class="form-group row">
                            <label for="labels_title" class="col-md-4 col-form-label text-md-right">{{ __('Label Title') }}</label>
                            <div class="col-md-6">
                              <input id="labels_title" type="text" class="form-control @error('labels_title') is-invalid @enderror" name="labels_title" value="{{$labels[0]->labels_title}}"  autocomplete="labels_title" autofocus placeholder="Please Enter Labels Title">
                              @error('labels_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          

                          <div class="form-group row">
                            <label for="labels_description" class="col-md-4 col-form-label text-md-right">{{ __('Label Description') }}</label>
                            <div class="col-md-6">
                              <input id="labels_description" type="text" class="form-control @error('labels_description') is-invalid @enderror" name="labels_description" value="{{$labels[0]->labels_description}}"  autocomplete="labels_description" autofocus placeholder="Please Enter Labels Description">
                              @error('labels_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="labels_url" class="col-md-4 col-form-label text-md-right">{{ __('Label Url') }}</label>
                            <div class="col-md-6">
                              <input id="labels_url" type="text" class="form-control @error('labels_url') is-invalid @enderror" name="labels_url" value="{{$labels[0]->labels_url}}"  autocomplete="labels_url" autofocus placeholder="Please Enter Menu Url">
                              @error('labels_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="labels_img" class="col-md-4 col-form-label text-md-right">{{ __('Label Image') }}</label>
                            <div class="col-md-6">
                              <input id="labels_img" type="file" class="form-control @error('labels_img') is-invalid @enderror" name="labels_img" value="{{$labels[0]->labels_img}}"  autocomplete="labels_img" autofocus placeholder="Please Enter Module Image">
                              @error('labels_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="labels_slug" class="col-md-4 col-form-label text-md-right">{{ __('Label Slug') }}</label>
                            <div class="col-md-6">
                              <input id="labels_slug" type="text" class="form-control @error('labels_slug') is-invalid @enderror" name="labels_slug" value="{{$labels[0]->labels_slug}}"  autocomplete="labels_slug" autofocus placeholder="Please Enter Label slug">
                              @error('labels_slug')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-success btn-xs">
                              {{ __('Update Label') }}
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

