@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_module">add Modules</button><button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Modules</div>
          <div class="panel-body">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>Module Id</th>
                  <th>Module Image</th>
                  <th>Module title</th>
                  <th>Module Description</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!$modules->isEmpty())
                @foreach($modules as $module)   
                <tr>
                  <!-- <td>{{ $no++ }}</td> -->
                  <td>{{$module->id}}</td>
                  <td><img src="{{ url('storage/app/uploads')}}/{{$module->modules_img}}" alt=""style="width: 88px; height: 88px; "></td>
                  <td>{{$module->modules_title}}</td>
                  <td>{{$module->modules_description}}</td>
                  <td>{{$module->created_at}}</td>
                  <td>{{$module->updated_at}}</td>
                  <td><span>
                    <a href="{{ url('view-services') }}/{{$module->id}}"><button type="button" class="btn btn-success btn-xs">services</button></a>

                    <a href="{{ url('edit-service-modules') }}/{{$module->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>

                    <a href="{{ url('delete-service-modules') }}/{{$module->id}}">
                      <button class="btn btn-primary btn-xs" onclick="myFunction()" value="Update">Delete</button></a></span></td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="8">*No Recored Available Please check*</td>                      
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Module Id</th>
                      <th>Module title</th>
                      <th>Module name</th>
                      <th>Module Description</th>
                      <th>Crate Time</th>
                      <th>Updated Time</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
                  <!-- Add Module Model Popup -->
                    <div class="container">
                      <div class="modal fade" id="add_module" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Add Module</h4>
                            </div>
                            <div class="modal-body">
                              <div class="panel-group">
                                <div class="panel panel-default">
                                  <div class="panel-heading">Add Module</div>
                                  <div class="panel-body">

                                   @if(empty($modules))
                                   <form method="post" action="{{ asset('add-service-modules') }}/{{$modules[0]->modules_id}}" enctype="multipart/form-data">
                                     @else
                                     <form method="post" action="{{ asset('add-service-modules') }}" enctype="multipart/form-data">                     
                                      @endif
                                      @csrf
                                      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />



                                      <div class="form-group row">
                                        <label for="modules_title" class="col-md-4 col-form-label text-md-right">{{ __('Module Title') }}</label>
                                        <div class="col-md-6">
                                          <input id="modules_title" type="text" class="form-control @error('modules_title') is-invalid @enderror" name="modules_title" value="{{ old('modules_title') }}"  autocomplete="modules_title" autofocus placeholder="Please Enter Modules Title">
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
                                          <input id="modules_name" type="text" class="form-control @error('modules_name') is-invalid @enderror" name="modules_name" value="{{ old('modules_name') }}"  autocomplete="modules_name" autofocus placeholder="Please Enter Module Name">
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
                                          <input id="modules_description" type="text" class="form-control @error('modules_description') is-invalid @enderror" name="modules_description" value="{{ old('modules_description') }}"  autocomplete="modules_description" autofocus placeholder="Please Enter Module Description">
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
                                          <input id="modules_url" type="text" class="form-control @error('modules_url') is-invalid @enderror" name="modules_url" value="{{ old('modules_url') }}"  autocomplete="modules_url" autofocus placeholder="Please Enter Menu Url">
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
                                          <input id="modules_img" type="file" class="form-control @error('modules_img') is-invalid @enderror" name="modules_img" value="{{ old('gallery_image') }}"  autocomplete="modules_img" autofocus placeholder="Please Enter Module Image">
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
                                          <input id="modules_slug" type="text" class="form-control @error('modules_slug') is-invalid @enderror" name="modules_slug" value="{{ old('modules_slug') }}"  autocomplete="menu_slug" autofocus placeholder="Please Enter Module slug">
                                          @error('modules_slug')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group input_size">
                                        <button type="submit" class="btn btn-success btn-xs">
                                          {{ __('add Module') }}
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
              