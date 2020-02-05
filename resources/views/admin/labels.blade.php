@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_label">add Labels</button>
            <button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Labels</div>
          <div class="panel-body">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <!-- <th>Id</th> -->
                  <th>Label Id</th>
                  <th>Label Image</th>
                  <th>Label title</th>
                  <th>Label Description</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!$labels->isEmpty())
                @foreach($labels as $label)
                <tr>
                  <!-- <td>{{ $no++ }}</td> -->
                  <td>{{$label->id}}</td>
                  <td><img src="{{ url('storage/app/uploads')}}/{{$label->labels_img}}" alt="" style="width: 88px; height: 88px;"></td>
                  <td>{{$label->labels_title}}</td>
                  <td>{{$label->labels_description}}</td>
                  <td>{{$label->created_at}}</td>
                  <td>{{$label->updated_at}}</td>
                  <td><span>
                    <a href="{{ url('/view-labels-menus') }}/{{$label->id}}"><button type="button" class="btn btn-success btn-xs">Label Menu</button></a>
                     <a href="{{ url('/view-label') }}/{{$label->id}}"><button type="button" class="btn btn-info btn-xs">View</button></a>
                    <a href="{{ url('/edit-labels') }}/{{$label->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                    <a href="{{ url('/delete-labels') }}/{{$label->id}}">
                      <button class="btn btn-primary btn-xs" onclick="myFunction();" value="Update">Delete</button></a></span></td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="8">*No Recored Available Please check*</td>                      
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Add Module Model Popup -->
          <div class="container">
            <div class="modal fade" id="add_label" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Label</h4>
                  </div>
                  <div class="modal-body">
                    <div class="panel-group">
                      <div class="panel panel-default">
                        <div class="panel-heading">Add Label</div>
                        <div class="panel-body">
                         @if(empty($labels))
                         <form method="post" action="{{ asset('add-labels') }}/{{$modules[0]->modules_id}}" enctype="multipart/form-data">
                           @else
                           <form method="post" action="{{ asset('add-labels') }}" enctype="multipart/form-data">                     
                            @endif
                            @csrf
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <div class="form-group row">
                              <label for="labels_title" class="col-md-4 col-form-label text-md-right">{{ __('Label Title') }}</label>
                              <div class="col-md-6">
                                <input id="labels_title" type="text" class="form-control @error('labels_title') is-invalid @enderror" name="labels_title" value="{{ old('labels_title') }}"  autocomplete="labels_title" autofocus placeholder="Please Enter Labels Title">
                                @error('labels_title')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="labels_description" class="col-md-4 col-form-label text-md-right">{{ __('Laebel Description') }}</label>
                              <div class="col-md-6">
                                <input id="labels_description" type="text" class="form-control @error('labels_description') is-invalid @enderror" name="labels_description" value="{{ old('labels_description') }}"  autocomplete="labels_description" autofocus placeholder="Please Enter Labels Description">
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
                                <input id="labels_url" type="text" class="form-control @error('labels_url') is-invalid @enderror" name="labels_url" value="{{ old('labels_url') }}"  autocomplete="labels_url" autofocus placeholder="Please Enter Menu Url">
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
                                <input id="labels_img" type="file" class="form-control @error('labels_img') is-invalid @enderror" name="labels_img" value="{{ old('labels_img') }}"  autocomplete="labels_img" autofocus placeholder="Please Enter Module Image">
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
                                <input id="labels_slug" type="text" class="form-control @error('labels_slug') is-invalid @enderror" name="labels_slug" value="{{ old('labels_slug') }}"  autocomplete="labels_slug" autofocus placeholder="Please Enter Label slug">
                                @error('labels_slug')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group input_size">
                              <button type="submit" class="btn btn-success btn-xs">
                                {{ __('add Label') }}
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button>
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
    <script>
      function goBack() {
        window.history.back();
      }
      function myFunction() {
        if(!confirm("Are You Sure to delete this"))
          event.preventDefault();
      }
    </script>