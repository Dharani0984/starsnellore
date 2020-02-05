@include('admin.header');
<style type="text/css">
  .addmenu{
    margin-top: 10px;
  }
  .input_size{
    width: 75%
  }
  .btn-margin{
    margin-top: -10px;
  }
  table{
  font-size: 13px;
  }
  th, td {
    border: none;
    margin: -5px;
    width: 0%;
    height: 15%;
    padding:2px;
    border-width:0;
    text-align: center;
    text-transform: capitalize;
  }
  .img-info{
    width: 111px;
    height: 74px;
  }
</style>

<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_img">add image</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      
      
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Home Gallery</div>
          <div class="panel-body">
            <table class="table table-bordered" cellspacing="10">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th>Image Title</th>
                  <th>Image Name</th>
                  <th>Image Description</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($gallery as $details)       
                <tr class="">
                  <td>{{$details->id}}</td>
                  <td><img class="img-info" src="{{url('storage/app/uploads')}}/{{$details->gallery_image}}"alt="image"/></td>
                  <td>{{$details->image_title}}</td>
                  <td>{{$details->image_name}}</td>
                  <td>{{$details->image_description}}</td>
                  <td>{{$details->created_at}}</td>
                  <td>{{$details->updated_at}}</td>
                  <td><span>
                    <a href="{{ asset('/view-gallery') }}/{{$details->id}}"><button type="button" class="btn btn-success btn-xs">view</button></a>

                    <a href="{{ asset('/edit-gallery') }}/{{$details->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>

                    <a href="{{ asset('/delete-gallery') }}/{{$details->id}}">
                      <button class="btn btn-primary btn-xs" value="Update">Delete</button></a></span></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
                  <h4 class="modal-title">Add Image</h4>
                </div>
                <div class="modal-body">
                  <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">Create Home Gallery</div>
                      <div class="panel-body">
                        <form method="post" action="{{ asset('create-home-gallery/') }}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <div class="form-group row">
                            <label for="gallery_title" class="col-md-4 col-form-label text-md-right">{{ __('Image Title') }}</label>
                            <div class="col-md-6">
                              <input id="image_title" type="text" class="form-control @error('image_title') is-invalid @enderror" name="image_title" value="{{ old('image_title') }}"  autocomplete="image_title" autofocus placeholder="Please Enter Image Title">
                              @error('image_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image_name" class="col-md-4 col-form-label text-md-right">{{ __('Image Name') }}</label>
                            <div class="col-md-6">
                              <input id="image_name" type="text" class="form-control @error('image_name') is-invalid @enderror" name="image_name" value="{{ old('image_name') }}"  autocomplete="image_name" autofocus placeholder="Please Enter Image Name">
                              @error('image_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image_description" class="col-md-4 col-form-label text-md-right">{{ __('Image Description') }}</label>
                            <div class="col-md-6">
                              <input id="image_description" type="text" class="form-control @error('image_description') is-invalid @enderror" name="image_description" value="{{ old('image_description') }}"  autocomplete="image_description" autofocus placeholder="Please Enter Image Description">
                              @error('image_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>
                            <div class="col-md-6">
                              <input id="image_url" type="text" class="form-control @error('image_url') is-invalid @enderror" name="image_url" value="{{ old('image_url') }}"  autocomplete="image_url" autofocus placeholder="Please Enter Image Url">
                              @error('image_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="gallery_image" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Image') }}</label>
                            <div class="col-md-6">
                              <input id="gallery_image" type="file" class="form-control @error('gallery_image') is-invalid @enderror" name="gallery_image" value="{{ old('gallery_image') }}"  autocomplete="gallery_image" autofocus placeholder="Please Enter Gallery Name">
                              @error('gallery_image')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image_sub_name" class="col-md-4 col-form-label text-md-right">{{ __('Image Sub Name') }}</label>
                            <div class="col-md-6">
                              <input id="image_sub_name" type="text" class="form-control @error('image_sub_name') is-invalid @enderror" name="image_sub_name" value="{{ old('image_sub_name') }}"  autocomplete="image_sub_name" autofocus placeholder="Please Enter Gallery Name">
                              @error('image_sub_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image_sub_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Sub Url') }}</label>
                            <div class="col-md-6">
                              <input id="image_sub_url" type="text" class="form-control @error('image_sub_url') is-invalid @enderror" name="image_sub_url" value="{{ old('image_sub_url') }}"  autocomplete="image_sub_url" autofocus placeholder="Please Enter Image Url">
                              @error('image_sub_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="gallery_sub_img" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Sub imag') }}</label>
                            <div class="col-md-6">
                              <input id="gallery_sub_img" type="file" class="form-control @error('gallery_sub_img') is-invalid @enderror" name="gallery_sub_img" value="{{ old('gallery_sub_img') }}"  autocomplete="gallery_sub_img" autofocus placeholder="Please Enter Gallery Sub Image">
                              @error('gallery_sub_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="image_slag" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Slug Name') }}</label>
                            <div class="col-md-6">
                              <input id="image_slag" type="text" class="form-control @error('image_slag') is-invalid @enderror" name="image_slag" value="{{ old('image_slag') }}"  autocomplete="image_slag" autofocus placeholder="Please Enter image Slugname">
                              @error('image_slag')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-primary">
                              {{ __('Add') }}
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- End Add Image Model Popup -->
      </div>
    </div>
  </div>
  @include('admin.footer');
