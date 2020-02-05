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
                @if(!$service_menus->isEmpty())

                  @foreach($service_menus as $service_menu)   
                <tr>
                  <th>Menu Id</th>
                  <td>{{$service_menu->id}}</td>
                </tr>
                <tr>
                  <th>menu title</th>
                  <td>{{$service_menu->menu_title}}</td>
                </tr>
                <tr>
                  <th>menu name</th>
                  <td>{{$service_menu->menu_name}}</td>
                </tr>
                <tr>
                  <th>menu image</th>
                  
                  <td>@if(!empty($service_menu->menu_img))<img src="{{ asset('/storage/app/uploads') }}/{{$service_menu->menu_img}}" width="10%" height="20%" alt="img"> @endif</td>
                 
                </tr>
                <tr>
                  <th>menu Description</th>
                   <td>{{$service_menu->menu_description}}</td>
                </tr>
                <tr>
                  <th>Crate Time</th>
                  <td>{{$service_menu->created_at}}</td>
                </tr>
                <tr>
                  <th>Updated Time</th>
                  <td>{{$service_menu->updated_at}}</td>
                </tr>
              </thead>
              <tbody>
                @endforeach
                 @else
                      <td colspan="8">*No Recored Available Please check*</td>                      
                  @endif
                  </tbody>
                </table>
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
  confirm("Are you sure delete?");
}
</script>