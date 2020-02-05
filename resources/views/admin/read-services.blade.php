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
    text-align: left;
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
          <div class="panel-heading">services</div>
          <div class="panel-body">
            <table class="table table-bordered" cellspacing="10">
              <thead>
                 @if(!$services->isEmpty())
                  @foreach($services as $service) 

                <tr>
                  <th>Service Id</th>
                  <td>{{ $no++ }}</td>
                </tr>
                <tr>
                  <th>menu title</th>
                   <td>{{$service->service_title}}</td>
                </tr>
                <tr>
                  <th>menu image</th>
                   <td><img rel="{{$service->id}}" src="../storage/app/uploads/{{$service->service_img}}" class="img-thumbnail" width="90px" height="90px" alt="" ></td>
                </tr>
                <tr>
                  <th>menu name</th>
                  <td>{{$service->service_name}}</td>
                  </tr>
                  <tr>
                  <th>menu Description</th>
                  <td>{{$service->service_description}}</td>
                </tr>
                <tr>
                  <th>Crate Time</th>
                 <td>{{$service->created_at}}</td>
                </tr>
                <tr>
                  <th>Updated Time</th>
                   <td>{{$service->updated_at}}</td>
                </tr>
                 
                </tr>
              </thead>
              <tbody>
                
             
              
               
                  
                  
                 
                  
                  
                  
                 
                  

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