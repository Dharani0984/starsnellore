@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default filterable">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_submenu">add Submenus</button><button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
          </div>
          <div class="panel-body">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr class="filters">
                  <th>Submenu Id</th>
                  <th>Submenu Image</th>
                  <th>Submenu title</th>
                  <th>Submenu price</th>
                  <th>Submenu Description</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!$service_submenus->isEmpty())
                @foreach($service_submenus as $service_submenu) 
                <tr>
                  <td>{{$service_submenu->id}}</td>
                  <td><img src="{{ url('storage/app/uploads')}}/{{$service_submenu->submenu_img}}" style="width: 88px; height: 88px;" alt=""></td>
                  <td>{{$service_submenu->submenu_title}}</td>
                  <td>{{$service_submenu->submenu_price}}</td>
                  <td>{{$service_submenu->submenu_description}}</td>
                  <td>{{$service_submenu->created_at}}</td>
                  <td>{{$service_submenu->updated_at}}</td>
                  <td><span>
                    <a href="{{ url('/read-service-submenu') }}/{{$service_submenu->id}}"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> view</button></a>
                    <a href="{{ url('/edit-service-submenu') }}/{{$service_submenu->id}}"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                    <a onclick="return myFunction();" href="{{ asset('/delete-service-submenu') }}/{{$service_submenu->id}}">
                      <button class="btn btn-primary btn-xs" value="Update"><i class="fa fa-trash"></i> Delete</button></a></span></td>
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
          <!-- Add Image Model Popup -->
          <div class="container">
            <div class="modal fade" id="add_submenu" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Submenus</h4>
                  </div>
                  <div class="modal-body">
                    <div class="panel-group">
                      <div class="panel panel-default">
                        <div class="panel-heading">Add Submenus</div>
                        <div class="panel-body">
                          <form method="post" action="{{ asset('add_service_submenu/') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            @if(!$service_menus->isEmpty())
                            <input id="menu_id" type="hidden" class="form-control @error('menu_id') is-invalid @enderror" name="menu_id" 
                            value="{{$service_menus[0]->id}}"  autocomplete="menu_id" autofocus placeholder="Please Enter Menu Id" readonly="true">

                            <input id="menu_name" type="hidden" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value="{{$service_menus[0]->menu_name}}"  autocomplete="service_name" autofocus placeholder="Please Enter Service Name" readonly="true">
                            @endif
                            <div class="form-group row">
                              <label for="submenu_title" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Title') }}</label>
                              <div class="col-md-6">
                                <input id="submenu_title" type="text" class="form-control @error('submenu_title') is-invalid @enderror" name="submenu_title" value="{{ old('submenu_title') }}"  autocomplete="submenu_title" autofocus placeholder="Please Enter submenu Title">
                                @error('submenu_title')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="submenu_name" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Name') }}</label>
                              <div class="col-md-6">
                                <input id="submenu_name" type="text" class="form-control @error('submenu_name') is-invalid @enderror" name="submenu_name" value="{{ old('submenu_name') }}"  autocomplete="submenu_name" autofocus placeholder="Please Enter submenu Name">
                                @error('submenu_name')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="submenu_price" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Price') }}</label>
                              <div class="col-md-6">
                                <input id="submenu_price" type="text" class="form-control @error('submenu_price') is-invalid @enderror" name="submenu_price" value="{{ old('submenu_price') }}"  autocomplete="submenu_price" autofocus placeholder="Please Enter submenu Name">
                                @error('submenu_price')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="submenu_description" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Description') }}</label>
                              <div class="col-md-6">
                                <input id="submenu_description" type="text" class="form-control @error('submenu_description') is-invalid @enderror" name="submenu_description" value="{{ old('submenu_description') }}"  autocomplete="submenu_description" autofocus placeholder="Please Enter submenu Description">
                                @error('submenu_description')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="submenu_url" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Url') }}</label>
                              <div class="col-md-6">
                                <input id="submenu_url" type="text" class="form-control @error('submenu_url') is-invalid @enderror" name="submenu_url" value="{{ old('submenu_url') }}"  autocomplete="submenu_url" autofocus placeholder="Please Enter submenu Url">
                                @error('submenu_url')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="submenu_img" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Image') }}</label>
                              <div class="col-md-6">
                                <input id="submenu_img" type="file" class="form-control @error('submenu_img') is-invalid @enderror" name="submenu_img" value="{{ old('gallery_image') }}"  autocomplete="submenu_img" autofocus placeholder="Please Enter submenu Image">
                                @error('submenu_img')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="submenu_slug" class="col-md-4 col-form-label text-md-right">{{ __('Submenu Slug') }}</label>
                              <div class="col-md-6">
                                <input id="submenu_slug" type="text" class="form-control @error('submenu_slug') is-invalid @enderror" name="submenu_slug" value="{{ old('submenu_slug') }}"  autocomplete="submenu_slug" autofocus placeholder="Please Enter submenu slug">
                                @error('submenu_slug')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group input_size">
                              <button type="submit" class="btn btn-success btn-xs">
                                {{ __('Add submenu') }}
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