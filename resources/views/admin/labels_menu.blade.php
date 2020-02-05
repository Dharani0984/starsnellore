@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_module">add Label menu</button><button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Labels menu</div>
          <div class="panel-body">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <!-- <th>Id</th> -->
                  <th>Label menu Id</th>
                  <th>Label menu Image</th>
                  <th>Label menu title</th>
                  <th>Label menu Description</th>
                  <th>Crate Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!$labels->isEmpty())
                @foreach($labels as $label)
                @foreach ($label->labels_menus as $menus)                
                @if(!$label->labels_menus->isEmpty())
                <tr>
                  <!-- <td>{{ $no++ }}</td> -->
                  <td>{{$menus->id}}</td>
                  <td><img src="{{ url('storage/app/uploads')}}/{{$menus->labels_menu_img}}" alt="" style="width: 88px; height: 88px;"></td>
                  <td>{{$menus->labels_menu_title}}</td>
                  <td>{{$menus->labels_menu_description}}</td>
                  <td>{{$menus->created_at}}</td>
                  <td>{{$menus->updated_at}}</td>
                  <td><span>                    
                    <a href="{{ url('/')}}/{{$menus->labels_menu_slug}}"><button type="button" class="btn btn-success btn-xs">Label Menu</button></a>

                    <a href="{{ url('/edit-labels-menu') }}/{{$menus->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>

                    <a href="{{ url('/delete-labels-menu') }}/{{$menus->id}}">
                      <button class="btn btn-primary btn-xs" onclick="myFunction();" value="Update">Delete</button></a></span></td>
                    </tr>

                    @else
                    <td colspan="8">*No Recored Available Please check*</td> 
                    @endif                  
                    @endforeach
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
            <div class="modal fade" id="add_module" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Label menu</h4>
                  </div>
                  <div class="modal-body">
                    <div class="panel-group">
                      <div class="panel panel-default">
                        <div class="panel-heading">Add Label menu</div>
                        <div class="panel-body">

                         @if(!empty($labels))
                         <form method="post" action="{{ asset('add-label_menu') }}/{{$labels[0]->id}}" enctype="multipart/form-data">
                           @else
                           <form method="post" action="{{ asset('add-label_menu') }}" enctype="multipart/form-data">                     
                            @endif
                            @csrf
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                            @if(!$labels->isEmpty())
                            <input id="labels_id" type="hidden" class="form-control @error('labels_id') is-invalid @enderror" name="labels_id" value="{{$labels[0]->id}}"  autocomplete="labels_id" autofocus placeholder="Please Label menu Module Id">

                            <input id="labels_title" type="hidden" class="form-control @error('labels_title') is-invalid @enderror" name="labels_title" value="{{$labels[0]->labels_title}}"  autocomplete="labels_title" autofocus placeholder="Please Enter Serice Title">
                            @endif

                            
                            <div class="form-group row">
                              <label for="labels_menu_title" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Title') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_title" type="text" class="form-control @error('labels_menu_title') is-invalid @enderror" name="labels_menu_title" value="{{ old('labels_menu_title') }}"  autocomplete="labels_menu_title" autofocus placeholder="Please Enter Laebel menu Title">
                                @error('labels_menu_title')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            

                            <div class="form-group row">
                              <label for="labels_menu_description" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Description') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_description" type="text" class="form-control @error('labels_menu_description') is-invalid @enderror" name="labels_menu_description" value="{{ old('labels_menu_description') }}"  autocomplete="labels_menu_description" autofocus placeholder="Please Enter Label menu Description">
                                @error('labels_menu_description')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="labels_menu_url" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Url') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_url" type="text" class="form-control @error('labels_menu_url') is-invalid @enderror" name="labels_menu_url" value="{{ old('labels_menu_url') }}"  autocomplete="labels_menu_url" autofocus placeholder="Please Enter Laebel menu Url">
                                @error('labels_menu_url')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="labels_menu_img" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Image') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_img" type="file" class="form-control @error('labels_menu_img') is-invalid @enderror" name="labels_menu_img" value="{{ old('gallery_image') }}"  autocomplete="labels_menu_img" autofocus placeholder="Please Enter Module Image">
                                @error('labels_menu_img')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="labels_menu_slug" class="col-md-4 col-form-label text-md-right">{{ __('Label menu Slug') }}</label>
                              <div class="col-md-6">
                                <input id="labels_menu_slug" type="text" class="form-control @error('labels_menu_slug') is-invalid @enderror" name="labels_menu_slug" value="{{ old('labels_menu_slug') }}"  autocomplete="labels_menu_slug" autofocus placeholder="Please Enter Label menu slug">
                                @error('labels_menu_slug')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group input_size">
                              <button type="submit" class="btn btn-success btn-xs">
                                {{ __('add Label menu') }}
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