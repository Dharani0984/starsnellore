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
    margin: -50px;
    width: 0%;
    height: 15%;
    padding:20px;
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
          <div class="panel-heading">service submenu</div>
          <div class="panel-body">
            <table class="table table-bordered" cellspacing="10">
              <thead>
               @if(!$service_submenus->isEmpty())

               @foreach($service_submenus as $service_submenu) 
               <tr>
                <th>Submenu Id</th>
                <td>{{$service_submenu->id}}</td>
              </tr>
              <tr>
                <th>submenu title</th>
                <td>{{$service_submenu->submenu_title}}</td>
              </tr>
              <tr>
                <th>submenu name</th>
                <td>{{$service_submenu->submenu_name}}</td>
              </tr>
              <tr>
                <th>submenu price</th>
                <td>RS - {{$service_submenu->submenu_price}} /-</td>
              </tr>
              <tr>
                <th>submenu Description</th>
                <td>{{$service_submenu->submenu_description}}</td>
              </tr>
              <tr>
                <th>Crate Time</th>
                <td>{{$service_submenu->created_at}}</td>
              </tr>
              <tr>
                <th>Updated Time</th>
                <td>{{$service_submenu->updated_at}}</td>
              </tr>
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