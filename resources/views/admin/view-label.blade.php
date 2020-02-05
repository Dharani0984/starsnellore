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
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_label">add Labels</button>
            <button class="btn btn-primary btn-xs" onclick="goBack();"style="float: right;">back</button>
            <!-- Trigger/Open The Modal -->
          </div>
        </div>
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Labels</div>
          <div class="panel-body">
            <table class="table table-bordered" cellspacing="10">
              <thead>
                 @if(!$labels->isEmpty())
                @foreach($labels as $label)
                <tr>
                  <th>Label Id</th>
                  <td>{{$label->id}}</td>
                </tr>
                <tr>
                  <th>Label title</th>
                  <td>{{$label->labels_title}}</td>
                </tr>
                <tr>
                  <th>Label Description</th>
                  <td>{{$label->labels_description}}</td>
                </tr>
                <tr>
                  <th>Label Url</th>
                  <td>{{$label->labels_url}}</td>
                </tr>
                <tr>
                  <th>Label Slug</th>
                  <td>{{$label->labels_slug}}</td>
                </tr>
                <tr>
                  <th>Crate Time</th>
                  <td>{{$label->created_at}}</td>
                </tr>
                <tr>
                  <th>Updated Time</th>
                  <td>{{$label->updated_at}}</td>
                </tr>
              </thead>
              <tbody>
                @endforeach
                    @else
                    <td colspan="8">*No Recored Available Please check*</td>                      
                    @endif
                    </tr>
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