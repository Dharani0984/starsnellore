@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_menu">add Menus</button><button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      
      
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Menus</div>
          <div class="panel-body">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>Menu Id</th>
                  <th>Menu Image</th>
                  <th>menu title</th>
                  <th>menu Description</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @if(!$service_menus->isEmpty())
                  @foreach($service_menus as $service_menu)   
                  <tr>
                  <td>{{$service_menu->id}}</td>
                  <td><img src="{{ url('storage/app/uploads')}}/{{$service_menu->menu_img}}" style="width: 88px; height: 88px;" alt=""></td>
                  <td>{{$service_menu->menu_title}}</td>
                  <td>{{$service_menu->menu_description}}</td>
                  <td>{{$service_menu->created_at}}</td>
                  <td>{{$service_menu->updated_at}}</td>
                  <td><span>
                    <a href="{{ url('/service_submenus') }}/{{$service_menu->id}}"><button type="button" class="btn btn-success btn-xs">Submenus</button></a>

                    <a href="{{ url('/read-service_menus') }}/{{$service_menu->id}}"><button type="button" class="btn btn-info btn-xs">view</button></a>

                    <a href="{{ url('/edit-service-menu') }}/{{$service_menu->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>

                    <a href="{{ url('/delete-service-menu') }}/{{$service_menu->id}}">
                      <button class="btn btn-primary btn-xs" onclick="myFunction()" value="Update">Delete</button></a></span></td>
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
          <div class="modal fade" id="add_menu" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Menus</h4>
                </div>
                <div class="modal-body">
                  <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">Add Menus</div>
                      <div class="panel-body">
                        <form method="post" action="{{ asset('add_service_menu/') }}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                               @if(!$services->isEmpty())
                              <input id="service_id" type="hidden" class="form-control @error('service_id') is-invalid @enderror" name="service_id" value="{{$services[0]->id}}"  autocomplete="service_id" autofocus placeholder="Please Enter service Id" readonly="true">
                             
                             <input id="service_name" type="hidden" class="form-control @error('service_name') is-invalid @enderror" name="service_name" value="{{$services[0]->service_name}}"  autocomplete="service_name" autofocus placeholder="Please Enter Service Name" readonly="true">
                            @endif


                          <div class="form-group row">
                            <label for="menu_title" class="col-md-4 col-form-label text-md-right">{{ __('Menu Title') }}</label>
                            <div class="col-md-6">
                              <input id="menu_title" type="text" class="form-control @error('menu_title') is-invalid @enderror" name="menu_title" value="{{ old('menu_title') }}"  autocomplete="menu_title" autofocus placeholder="Please Enter Menu Title">
                              @error('menu_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_name" class="col-md-4 col-form-label text-md-right">{{ __('Menu Name') }}</label>
                            <div class="col-md-6">
                              <input id="menu_name" type="text" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value="{{ old('menu_name') }}"  autocomplete="menu_name" autofocus placeholder="Please Enter Menu Name">
                              @error('menu_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_description" class="col-md-4 col-form-label text-md-right">{{ __('Menu Description') }}</label>
                            <div class="col-md-6">
                              <input id="menu_description" type="text" class="form-control @error('menu_description') is-invalid @enderror" name="menu_description" value="{{ old('menu_description') }}"  autocomplete="menu_description" autofocus placeholder="Please Enter Menu Description">
                              @error('menu_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>
                            <div class="col-md-6">
                              <input id="menu_url" type="text" class="form-control @error('menu_url') is-invalid @enderror" name="menu_url" value="{{ old('menu_url') }}"  autocomplete="menu_url" autofocus placeholder="Please Enter Menu Url">
                              @error('menu_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_img" class="col-md-4 col-form-label text-md-right">{{ __('Menu Image') }}</label>
                            <div class="col-md-6">
                              <input id="menu_img" type="file" class="form-control @error('menu_img') is-invalid @enderror" name="menu_img" value="{{ old('gallery_image') }}"  autocomplete="menu_img" autofocus placeholder="Please Enter Menu Image">
                              @error('menu_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="menu_slug" class="col-md-4 col-form-label text-md-right">{{ __('Menu Slug') }}</label>
                            <div class="col-md-6">
                              <input id="menu_slug" type="text" class="form-control @error('menu_slug') is-invalid @enderror" name="menu_slug" value="{{ old('menu_slug') }}"  autocomplete="menu_slug" autofocus placeholder="Please Enter Menu slug">
                              @error('menu_slug')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-success btn-xs">
                              {{ __('Add Menu') }}
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