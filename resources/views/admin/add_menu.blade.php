@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_menu">add Menu</button>
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_submenu">add Submenu</button>
            <button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>

            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Menus</div>
          <div class="panel-body">
            <table class="table table-bordered" cellspacing="10">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Menu Name</th>
                  <th>Menu Routing</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@if(!empty($menu))
                @foreach($menu as $menus)       
                <tr class="">
                  <td>{{$menus->id}}</td>
                  <td>{{$menus->menu_name}}</td>
                  <td>{{$menus->url}}</td>
                  <td>{{$menus->created_at}}</td>
                  <td>{{$menus->updated_at}}</td>
                  <td><span>
                    <a href="{{ asset('/addsubmenu') }}/{{$menus->id}}"><button type="button" class="btn btn-success btn-xs">sub menus</button></a>
                    <a href="{{ asset('/view-menu') }}/{{$menus->id}}"><button type="button" class="btn btn-success btn-xs">view</button></a>

                    <a href="{{ asset('/edit-menu') }}/{{$menus->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>

                    <a href="{{ asset('/delete-menu') }}/{{$menus->id}}">
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
          <!-- Add menu Model Popup -->
          <div class="container">
            <div class="modal fade" id="add_menu" role="dialog">
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
                         <form method="post" action="{{ asset('create_menu/') }}">
                          @csrf

                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <div class="form-group row">
                            <label for="menu_name" class="col-md-4 col-form-label text-md-right">{{ __('Add Menu') }}</label>

                            <div class="col-md-6">
                              <input id="menu_name" type="text" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" value="{{ old('menu_name') }}"  autocomplete="menu_name" autofocus placeholder="Please Enter Menu">
                              @error('menu_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Add Menu Url') }}</label>
                            <div class="col-md-6">
                              <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}"  autocomplete="url" autofocus placeholder="Please Enter Url">
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
                                {{ __('Add') }}
                              </button>
                            </div>
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
        <!-- End Add menu Model Popup -->
        <!-- Add submenu Model Popup -->
        <div class="container">
          <div class="modal fade" id="add_submenu" role="dialog">
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
                        <form method="post" action="{{ asset('createsubmenu/') }}">
                          @csrf

                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                          <div class="form-group row">
                            <label for="menu_item" class="col-md-4 col-form-label text-md-right">{{ __('Add Menu') }}</label>
                            <div class="col-md-6">
                              <select id="menu_item" class="form-control @error('menu_item') is-invalid @enderror" name="menu_item" value="{{ old('menu_item') }}"  autocomplete="menu_item" autofocus>
                                <option value="">Select Menu*</option>  

                                @foreach($menu as $item)
                                <option value="{{$item->id}}">{{$item->menu_name}}</option>
                                @endforeach
                              </select>
                              @error('menu_item')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="submenu_name" class="col-md-4 col-form-label text-md-right">{{ __('Add Sub Menu') }}</label>
                            <div class="col-md-6">
                              <input id="submenu_name" type="text" class="form-control @error('submenu_name') is-invalid @enderror" name="submenu_name" value="{{ old('submenu_name') }}"  autocomplete="submenu_name" autofocus>
                              @error('submenu_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Add Sub Menu Url') }}</label>
                            <div class="col-md-6">
                              <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}"  autocomplete="link" autofocus>
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
                                {{ __('Add') }}
                              </button>
                            </div>
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
  <script>
    function goBack() {
      window.history.back();
    }
    function myFunction() {
      if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
  </script>