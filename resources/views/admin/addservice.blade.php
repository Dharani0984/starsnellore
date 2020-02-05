@include('admin.header')
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="row-one widgettable">
            <div class="col-md-7 content-top-2 card" style="width:100%">
                <div class="agileinfo-cdr">
                    <div class="card-header">
                        <h3>Add Menu & Sub menus</h3>
                    </div>



                    <div class="row addmenu">
                        <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <a href="{{ asset('menu/') }}"><button type="submit" class="btn btn-primary">
                                            {{ __('Menu') }}
                                        </button></a>
                                        <a href="{{ asset('submenu/') }}"><button type="submit" class="btn btn-primary">
                                            {{ __('Sub menu') }}
                                        </button></a>
                                    </div>
                                </div>


                    </div>


                    <div class="row" style="margin-top: 68px;">
                        <div class="card-body">
                            <!-- <form method="post" action="{{ asset('createservice/') }}">
                                @csrf

                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="form-group row">
                                    <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Add Services') }}</label>

                                    <div class="col-md-6">
                                        <input id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" value="{{ old('service') }}" required autocomplete="service" autofocus>
                                        @error('service')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('admin.footer');