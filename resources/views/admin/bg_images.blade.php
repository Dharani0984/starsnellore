@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_img">add Slider</button>
            <button onclick="goBack()" class="btn btn-warning btn-right btn-xs" style="float: right" value="Update">Back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      <div class="drag">
         @if(!$bg_images->isEmpty())
       @foreach($bg_images as $val)   
    <img rel="{{$val->id}}" src="../admin/storage/app/uploads/{{$val->slider_img}}" class="img-thumbnail" width="150px" height="150px" alt="" >
       @endforeach 
       @endif
     </div>
     <!--<p id="output">1,2,3</p>-->
   </div>
   <div class="panel panel-default filterable">
    <div class="panel-heading">
      <h3 class="panel-title">Slider Images</h3>
      <div class="pull-right">
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Gallery ID</th>
          <th>Slider Image</th>
          <th>Slider Title</th>
          <th>Silder Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if(!$bg_images->isEmpty())
        @foreach($bg_images as $val)  
        <tr>
          <td>{{$val->id}}</td>
          <td><img rel="{{$val->id}}" src="../admin/storage/app/uploads/{{$val->slider_img}}" class="img-thumbnail" width="90px" height="90px" alt="" ></td>

          <td>{{$val->slider_title}}</td>
          <td>{{$val->slider_name}}</td>
          <td><a href="{{ asset('view-home-slider') }}/{{$val->id}}"><button type="button" class="btn-success btn-xs">view</button></a>
            <a href="{{ asset('edit-home-slider') }}/{{$val->id}}"><button type="button" class="btn-xs btn-warning">Edit</button></a>
            <a href="{{ asset('delete-home-slider') }}/{{$val->id}}"><button type="button" onclick="myFunction();" class="btn-xs btn-primary">Delete</button></a></td>
          </tr>
          @endforeach 
          @else
          <td colspan="8">* No Records Not Found *</td>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- Add Image Model Popup -->
<div class="container">
  <div class="modal fade" id="add_img" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Slider</h4>
        </div>
        <div class="modal-body">
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">Create Home Gallery</div>
              <div class="panel-body">
                <form method="post" action="{{ asset('create-home-slider') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                  <div class="form-group row">
                    <label for="slider_title" class="col-md-4 col-form-label text-md-right">{{ __('Slider Title') }}</label>
                    <div class="col-md-6">
                      <input id="slider_title" type="text" class="form-control @error('slider_title') is-invalid @enderror" name="slider_title" value="{{ old('slider_title') }}"  autocomplete="slider_title" autofocus placeholder="Please Enter Slider Title">
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
                      <input id="slider_name" type="text" class="form-control @error('slider_name') is-invalid @enderror" name="slider_name" value="{{ old('slider_name') }}"  autocomplete="slider_name" autofocus placeholder="Please Enter Slider Name">
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
                      <input id="slider_description" type="text" class="form-control @error('slider_description') is-invalid @enderror" name="slider_description" value="{{ old('slider_description') }}"  autocomplete="slider_description" autofocus placeholder="Please Enter Image Description">
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
                      <input id="slider_url" type="text" class="form-control @error('slider_url') is-invalid @enderror" name="slider_url" value="{{ old('slider_url') }}"  autocomplete="slider_url" autofocus placeholder="Please Enter Image Url">
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
                      <input id="slider_img" type="file" class="form-control @error('slider_img') is-invalid @enderror" name="slider_img" value="{{ old('slider_img') }}"  autocomplete="slider_img" autofocus placeholder="Please Enter Slider Name">
                      @error('slider_img')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="slider_slug" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Slug Name') }}</label>
                    <div class="col-md-6">
                      <input id="slider_slug" type="text" class="form-control @error('slider_slug') is-invalid @enderror" name="slider_slug" value="{{ old('slider_slug') }}"  autocomplete="slider_slug" autofocus placeholder="Please Enter Slider Slug name">
                      @error('slider_slug')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group input_size">
                    <button type="submit" class="btn btn-primary btn-xs">
                      {{ __('Add') }}
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Add Image Model Popup -->
@include('admin.footer');
  <script>
    function goBack() {
      window.history.back();
    }

    function myFunction() {
      if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
  </script>