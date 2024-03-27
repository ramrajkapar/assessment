@if (count($errors) > 0)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-body d-flex align-items-center">
            <i data-feather='alert-octagon' class="me-50"></i>
            <span> {!! Session::get('error') !!}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert {{ session('class') ? 'alert alert-success' : 'alert-info' }} alert-dismissible" role="alert">
        <div class="alert-body">
            {!! Session::get('message') !!}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (Session::has('status'))
    <div class="alert {{ session('class') ? 'alert alert-success' : 'alert-info' }} alert-dismissible" role="alert">
        <div class="alert-body">
            {!! Session::get('status') !!}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {!! session('success') !!}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('flash_info'))
    <div class="alert alert-info alert-dismissible" role="alert">
        <div class="alert-body d-flex align-items-center">
            <i data-feather='info' class="me-50"></i>
            <span> {!! Session::get('flash_info') !!}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('flash_success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-body d-flex align-items-center">
            <i data-feather='check-circle' class="me-50"></i>
            <span> {!! Session::get('flash_success') !!}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('flash_warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <div class="alert-body d-flex align-items-center">
            <i data-feather='alert-triangle' class="me-50"></i>
            <span> {!! Session::get('flash_warning') !!}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('flash_error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-body d-flex align-items-center">
            <i data-feather='alert-octagon' class="me-50"></i>
            <span> {!! Session::get('flash_error') !!}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

