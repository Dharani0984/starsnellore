@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_services">add services</button><button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      
      
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">services</div>
          <div class="panel-body">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>Service Id</th>
                  <th>Service Image</th>
                  <th>Service name</th>
                  <th>Service Description</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @if(!$services->isEmpty())
                  @foreach($services as $service)   
                  <tr>
                  <td>{{$service->id}}</td>
                  <td><img rel="{{$service->id}}" src="{{ url('storage/app/uploads')}}/{{$service->service_img}}" width="90px" height="90px" alt="" ></td>
                  <td>{{$service->service_title}}</td>
                  <td>{{$service->service_description}}</td>
                  <td>{{$service->created_at}}</td>
                  <td>{{$service->updated_at}}</td>
                  <td><span>

                    <a href="{{ url('/view_services_menus') }}/{{$service->id}}"><button type="button" class="btn btn-success btn-xs">Menus</button></a>

                    <a href="{{ url('/read-services') }}/{{$service->id}}"><button type="button" class="btn btn-info btn-xs">view</button></a>

                    <a href="{{ url('/edit-services') }}/{{$service->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>

                    <a href="{{ url('/delete-services') }}/{{$service->id}}">
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
    

<!-- Add Module Model Popup -->
        <div class="container">
          <div class="modal fade" id="add_services" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add services</h4>
                </div>
                <div class="modal-body">
                  <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">Add services</div>
                      <div class="panel-body">
                        
                        <form method="post" action="{{ asset('add-services') }}/{{$modules[0]->id}}" enctype="multipart/form-data">
                        
                          @csrf
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                          @if(!$modules->isEmpty())
                            <input id="module_id" type="hidden" class="form-control @error('modules_id') is-invalid @enderror" name="module_id" value="{{$modules[0]->id}}"  autocomplete="module_id" autofocus placeholder="Please Enter Module Id">

                            <input id="module_name" type="hidden" class="form-control @error('module_name') is-invalid @enderror" name="module_name" value="{{$modules[0]->modules_name}}"  autocomplete="module_name" autofocus placeholder="Please Enter Serice Title">
                           @endif

                          <div class="form-group row">
                            <label for="service_id" class="col-md-4 col-form-label text-md-right">{{ __('service Title') }}</label>
                            <div class="col-md-6">
                              <input id="service_title" type="text" class="form-control @error('service_title') is-invalid @enderror" name="service_title" value="{{ old('service_title') }}"  autocomplete="service_title" autofocus placeholder="Please Enter Serice Title">
                              @error('service_title')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_name" class="col-md-4 col-form-label text-md-right">{{ __('Menu Name') }}</label>
                            <div class="col-md-6">
                              <input id="service_name" type="text" class="form-control @error('service_name') is-invalid @enderror" name="service_name" value="{{ old('service_name') }}"  autocomplete="service_name" autofocus placeholder="Please Enter Service Name">
                              @error('service_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_description" class="col-md-4 col-form-label text-md-right">{{ __('Module Description') }}</label>
                            <div class="col-md-6">
                              <input id="service_description" type="text" class="form-control @error('service_description') is-invalid @enderror" name="service_description" value="{{ old('service_description') }}"  autocomplete="service_description" autofocus placeholder="Please Enter Service Description">
                              @error('service_description')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_url" class="col-md-4 col-form-label text-md-right">{{ __('Module Url') }}</label>
                            <div class="col-md-6">
                              <input id="service_url" type="text" class="form-control @error('service_url') is-invalid @enderror" name="service_url" value="{{ old('service_url') }}"  autocomplete="service_url" autofocus placeholder="Please Enter Menu Url">
                              @error('service_url')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_img" class="col-md-4 col-form-label text-md-right">{{ __('Module Image') }}</label>
                            <div class="col-md-6">
                              <input id="service_img" type="file" class="form-control @error('service_img') is-invalid @enderror" name="service_img" value="{{ old('service_img') }}"  autocomplete="service_img" autofocus placeholder="Please Enter Service Image">
                              @error('service_img')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="service_slug" class="col-md-4 col-form-label text-md-right">{{ __('Menu Slug') }}</label>
                            <div class="col-md-6">
                              <input id="service_slug" type="text" class="form-control @error('service_slug') is-invalid @enderror" name="service_slug" value="{{ old('service_slug') }}"  autocomplete="service_slug" autofocus placeholder="Please Enter Service slug">
                              @error('service_slug')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group input_size">
                            <button type="submit" class="btn btn-success btn-xs">
                              {{ __('add service') }}
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