@include('admin.header');
<div id="page-wrapper">
	<div class="main-page">
		<div class="row-one widgettable">
			<!-- Update Image Model Popup -->
			
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-primary btn-xs" value="Update">update Var</button>	
						<button onclick="goBack()" class="btn btn-warning btn-right btn-xs" style="float: right" value="Update">Back</button>
					</div>
					<div class="panel-body">
            @if(!empty($vars))
            <form method="post" action="{{ asset('update-var') }}/{{$vars[0]->id}}" enctype="multipart/form-data">
             @else
             <form method="post" action="{{ asset('update-var') }}" enctype="multipart/form-data">                     
              @endif
              @csrf
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />



              <div class="form-group row">
                <label for="var_title" class="col-md-4 col-form-label text-md-right">{{ __('var title') }}</label>
                <div class="col-md-6">
                  <input id="var_title" type="text" class="form-control @error('var_title') is-invalid @enderror" name="var_title" value="{{$vars[0]->var_title}}"  autocomplete="var_title" autofocus placeholder="Please Enter Labels Title">
                  @error('var_title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="labels_title" class="col-md-4 col-form-label text-md-right">{{ __('var type') }}</label>
                <div class="col-md-6">
                 <select name="var_type" class="form-control width @error('var_type') is-invalid @enderror input" autocomplete="menu_name" autofocus>
                   <option value="1">Html Box</option>
                   <option value="2">Text Box</option>
                 </select>
                 @error('var_type')
                 <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>


            <div class="form-group input_size">
              <button type="submit" class="btn btn-success btn-xs">
                {{ __('Update var') }}
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

