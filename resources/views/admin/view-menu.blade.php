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
                @if(!empty($menu))
                @foreach($menu as $menus)
                <tr>
                  <th>Id</th>
                  <td>{{$menus->id}}</td>
                </tr>
                <tr>
                  <th>Menu Name</th>
                  <td>{{$menus->menu_name}}</td>
                </tr>
                <tr>
                  <th>Menu Description</th>
                  <td>{{$menus->description}}</td>
                </tr>
                <tr>
                  <th>Menu Url</th>
                  <td>{{$menus->url}}</td>
                </tr>
                <tr>
                  <th>Crate Time</th>
                  <td>{{$menus->created_at}}</td>
                </tr>
                <tr>
                  <th>Updated Time</th>
                  <td>{{$menus->updated_at}}</td>
                </tr>
                @endforeach
                @else
                <td colspan="8">*No Recored Available Please check*</td> 
                @endif
              </thead>
              <tbody> 
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