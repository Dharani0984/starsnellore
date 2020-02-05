@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Sub menus</div>
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
               @if(!$menus->isEmpty())
               @foreach($menus as $submenu)
                  
               <tr class="">
                <td>{{$submenu->id}}</td>
                <td>{{$submenu->submenu_name}}</td>
                <td>{{$submenu->link}}</td>
                <td>{{$submenu->created_at}}</td>
                <td>{{$submenu->updated_at}}</td>
                <td><span>

                  <a href="{{ asset('/view-submenu') }}/{{$submenu->id}}"><button type="button" class="btn btn-success btn-xs">view</button></a>

                  <a href="{{ asset('/edit-submenu') }}/{{$submenu->id}}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>

                  <a href="{{ asset('/delete-submenu') }}/{{$submenu->id}}">
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