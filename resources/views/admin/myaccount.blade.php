@include('admin.header');
<!--Profile Card-->
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("show");
         });
      </script>
<style>
      .dob{
        position: absolute;
    top: 0px;
    z-index: 1;
    display: block;
  }
</style>
<div class="container">
  <div class="row" style="margin-left: 14%; margin-top: 80px;">
    <div class="col-md-10 ">
      <form class="form-horizontal" action="{{ URL::to('/createmyaccount') }}" method="post" enctype="multipart/form-data"  files ="true">
       @csrf
       <fieldset>
        <!-- Form Name -->
        <legend>User Account Details</legend>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Name (Full name)">Name (Full name)</label>  
          <div class="col-md-4">
           <div class="input-group">
             <div class="input-group-addon">
              <i class="fa fa-user">
              </i>
            </div>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}"  autocomplete="name" autofocus placeholder="Please Enter Name" readonly>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>

      <!-- File Button --> 
      <div class="form-group">
        <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
        <div class="col-md-4">
          <div class="input-group">
           <div class="input-group-addon">
            <i class="fa fa-photo">
            </i>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ Auth::user()->photo }}"  autocomplete="photo" autofocus placeholder="Please Enter Menu">
          @error('photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>  
      <div class="col-md-4">

        <div class="input-group">
         <div class="input-group-addon">
           <i class="fa fa-birthday-cake"></i>

         </div>

         <input type = "text" id = "datepicker-13" name="dob" id="dob" class="dob form-control @error('photo') is-invalid @enderror" 
         value="{{ date('d-F-Y', strtotime(Auth::user()->dob)) }} ">
         @error('dob')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

    </div>
  </div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="Father">Father's name</label>  
    <div class="col-md-4">
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-male" style="font-size: 20px;"></i>

      </div>

      <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ Auth::user()->fname }}"  autocomplete="fname" autofocus placeholder="Father's name">
      @error('fname')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror

    </div>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Mother">Mother's Name</label>  
  <div class="col-md-4">
    <div class="input-group">
     <div class="input-group-addon">
      <i class="fa fa-female" style="font-size: 20px;"></i>

    </div>

    <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ Auth::user()->mname }}"  autocomplete="mname" autofocus placeholder="Mother's Name">
    @error('mname')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Phone number ">Phone number </label>  
  <div class="col-md-4">
    <div class="input-group">
     <div class="input-group-addon">
       <i class="fa fa-phone"></i>

     </div>

     <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}"  autocomplete="phone" autofocus placeholder="Primary Phone number ">
     @error('phone')
     <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
  <div class="col-md-4">
    <div class="input-group">
     <div class="input-group-addon">
       <i class="fa fa-envelope-o"></i>

     </div>

     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"  autocomplete="email" autofocus placeholder="Email Address" required>
     @error('email')
     <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

  </div>

</div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Overview (max 200 words)">Enter full Address </label>
  <div class="col-md-4"> 
   <div class="input-group">
     <div class="input-group-addon">
       <i class="fa fa-envelope-o"></i>

     </div>                    
     <textarea class="form-control" rows="10"  id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}"  autocomplete="address" autofocus required>{{ Auth::user()->address }}</textarea>
     @error('address')
     <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
    <a href="#">
      <span class="glyphicon glyphicon-thumbs-up"></span> 
      <button type="submit" class="btn btn-success">
        {{ __('Update') }}
      </button></a>
      <a href="#">
        <span class="glyphicon glyphicon-remove-sign"></span> 

      </a>

    </div>
  </div>

</fieldset>
</form>
</div>
<div class="col-md-2 hidden-xs">
  <img src="{{ url('storage/app/uploads' )}}/{{ Auth::user()->photo }}" class="img-responsive img-thumbnail" alt="">
</div>


</div>
</div>
<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

@include('admin.footer');