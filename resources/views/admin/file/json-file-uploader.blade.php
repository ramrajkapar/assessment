@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @include('alert')
    <form action="{{ route('admin.json.file.post') }}" method="post" class="mt-1" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class='col-md-1'>

            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="exampleInputFile">Upload JSON file to convert into excel file</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="jsonFile" name="jsonFile"
                                onchange="updateFileNameLabel()">
                            <label class="custom-file-label" for="exampleInputFile">Choose JSON File</label>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-success" icon="fas fa-lg fa-save">Submit</button>
            </div>
        </div>
    </form>

@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.name', 'Assessment') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.alert').hide();
            }, 2000);

           
        });
        function updateFileNameLabel() {
                var fileName = document.getElementById('jsonFile').files[0].name;
                var label = document.querySelector('.custom-file-label');
                label.innerHTML = fileName;
            }
    </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    <style type="text/css">

    </style>
@endpush
