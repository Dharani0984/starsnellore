@include('admin.header');
<style>
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
                </tr>
              </thead>
              <tbody>
               @if(!$submenu->isEmpty())
               @foreach($submenu as $submenu)      
               <tr class="">
                <td>{{$submenu->id}}</td>
                <td>{{$submenu->submenu_name}}</td>
                <td>{{$submenu->link}}</td>
                <td>{{$submenu->created_at}}</td>
                <td>{{$submenu->updated_at}}</td>
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