@include('admin.header');
<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one widgettable">
      <!DOCTYPE html>
      <html>
      <head>
        <style>
          .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
          }
          .title {
            color: grey;
            font-size: 18px;
          }
          button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
          }
          button:hover, a:hover {
            opacity: 0.7;
          }
        </style>
        <aside class="profile-card">
          <div class="card">
           <img src="{{ url('storage/app/uploads')}}/{{ Auth::user()->photo }}"  alt="" style="width: 100%">
           <h1>{{ Auth::user()->name }}</h1>
           <p>D.O.B:{{ Auth::user()->dob }}</p>
           <p>PH:{{ Auth::user()->phone }}</p>
           <p>EMAIL:{{ Auth::user()->email }}</p>
           <p>ADDRESS:{{ Auth::user()->address }}</p>
           <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a> 
          </div>
          <p><button>Contact</button></p>
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer');