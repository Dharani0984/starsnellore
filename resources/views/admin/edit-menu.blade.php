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
            <button class="btn btn-primary btn-xs" value="Update">update menu</button> 
            <button onclick="goBack()" class="btn btn-warning btn-right btn-xs" value="Update">Back</button>
          </div>
          <div class="panel-body">
            <form method="post" action="{{ asset('update-menu') }}/{{$menu[0]->id}}">
              @csrf
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <div class="form-group row">
                <label for="menu_name" class="col-md-4 col-form-label text-md-right">{{ __('Update Menu') }}</label>

                <div class="col-md-6">
                  <input id="menu_name" type="text" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value=" {{$menu[0]->menu_name}}"  autocomplete="menu_name" autofocus placeholder="Please Enter Menu">
                  @error('menu_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Update Menu Url') }}</label>
                <div class="col-md-6">
                  <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value=" {{$menu[0]->url}}"  autocomplete="url" autofocus placeholder="Please Enter Url">
                  @error('url')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                  </button>
                </div>
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

