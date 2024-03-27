@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        excel files| @yield('subtitle')
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
    <table id="excel-table" class="table table-bordered table-hover" style="margin-top:5%">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>JSON File</th>
                <th>Excel File</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($files as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        <a href="{{ route('admin.download.jsonfile', ['filename' => $item->json_file]) }}" class="text-primary">
                        <i class="fas fa-download"></i> {{$item->json_file}}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.download.excelfile', ['filename' => $item->excel_file]) }}" class="text-success">
                            <i class="fas fa-download"></i> {{$item->excel_file}}
                        </a>
                    </td>
                    <td>{{$item->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#excel-table').DataTable();
        });
    </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style type="text/css">

    </style>
@endpush
