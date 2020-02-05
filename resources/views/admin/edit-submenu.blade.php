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
            <form method="post" action="{{ asset('update-submenu') }}/{{$submenu[0]->id}}">
              @csrf
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <div class="form-group row">
                <label for="submenu_name" class="col-md-4 col-form-label text-md-right">{{ __('Update Menu') }}</label>

                <div class="col-md-6">
                  <input id="submenu_name" type="text" class="form-control @error('submenu_name') is-invalid @enderror" name="submenu_name" value=" {{$submenu[0]->submenu_name}}"  autocomplete="submenu_name" autofocus placeholder="Please Enter Menu">
                  @error('submenu_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Update Menu Url') }}</label>
                <div class="col-md-6">
                  <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value=" {{$submenu[0]->link}}"  autocomplete="link" autofocus placeholder="Please Enter Url">
                  @error('link')
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

