@include('admin.header');
<style>
  .input{
    margin-left: 30px;
  }
</style>
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">

     <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">Vars</div>
        <div class="panel-body">
          <form method="post" action="{{ asset('create-var') }}">
            @csrf

            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <table class="table table-bordered" cellspacing="10">
              <thead>
                <tr>
                 <th class="theading">Var Title</th>
                 <th class="theading">Var Name</th>
                 <th class="theading">Var Type</th>
                 <th class="theading">add</th>
               </tr>
             </thead>
             <tbody>
              
              <tr class="">
                <td><div class="form-group input_size">
                  <input type="text" name="var_title" id="var_title" class="form-control width @error('var_title') is-invalid @enderror input" autocomplete="var_title" autofocus placeholder="Enter Var Title">
                  @error('var_title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div></td>
                <td><div class="form-group input_size">
                  <input type="text" name="var_name" id="var_name" class="form-control width @error('var_name') is-invalid @enderror input" autocomplete="menu_name" autofocus placeholder="Enter Var Name">
                  @error('var_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div></td>
                <td><div class="form-group input_size" >
                 <select name="var_type" class="form-control width @error('var_name') is-invalid @enderror input" autocomplete="menu_name" autofocus>
                   <option value="1">Html Box</option>
                   <option value="2">Text Box</option>
                 </select>
               </div>
               <input type="hidden" name="var_desc" id="var_desc" class="form-control width @error('var_desc') is-invalid @enderror" autocomplete="var_desc" autofocus placeholder="Enter Var Name"></td>
               <td><div class="form-group input_size">
                <button type="submit" class="btn btn-primary btn-xs">
                  {{ __('Add') }}
                </button>
              </div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Vars</div>
      <div class="panel-body">
        <table class="table table-bordered" cellspacing="10">
          <thead>
            <tr>
              <th>Var Title</th>
              <th>Var Name</th>
              <th>Var Type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
            @foreach($data as $val)      
            <tr class="">
              <td>{{ $val['var_title'] }}</td>
              <td>{{ $val['var_name'] }}</td>
              <td>{{ $val['var_type'] }}</td>
              <td><span>
                <a href="{{ asset('edit-var') }}/{{ $val['id'] }}"><button type="button" class="btn btn-success btn-xs">Edit</button></a>
                <a href="{{ asset('/edit-hide') }}/{{ $val['var_name'] }}"><button type="button" onclick="change();" class="btn btn-success btn-xs">Hide</button></a></span></td>
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

</script>
