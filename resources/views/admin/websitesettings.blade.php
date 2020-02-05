@include('admin.header');
<style type="text/css">
    .addmenu{
        margin-top: 10px;
    }
</style>

<div id="page-wrapper">
    <div class="main-page">
        <div class="row-one widgettable">
            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading"><a href="{{ asset('vars') }}"><button type="button" class="btn-xs btn-success">vars</button></a></div>
                  <div class="panel-body">
                    <form method="post" action="{{ asset('/create-var-desc') }}">
                        @csrf
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                        <div class="form-group row">
                            <div class="col-md-12">
                                <select id="var_type" onchange="myvar_type()" name="var_type" class="form-control width @error('var_name') is-invalid @enderror" autocomplete="menu_name" autofocus>
                                    <option value="">Please Select Vars *</option>
                                    @foreach($data as $val)
                                    <option value="{{ $val['id'] }}" {{ (@request()->segment(2)== $val['id'])?"selected":"" }}>{{ $val['var_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                             <textarea name="var_desc" id="editor">{{ $desc['var_desc'] }}</textarea>
                             <script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
                             <script>
                                CKEDITOR.replace('editor', {
                                    filebrowserUploadUrl: "{{ asset('public/ckeditor/ck_upload.php') }}",
                                    filebrowserUploadMethod: 'form'
                                });
                            </script>
                        </div>
                    </div>
              

                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@include('admin.footer');
<script type="text/javascript">
    function myvar_type(){
        var x = document.getElementById("var_type").value;
        
         if(x === '') {
         $('#editor').hide();
         } else {
         $('#editor').show();
         }

        window.location='{{url('/')}}/websitesettings/'+x;
    }
</script>


