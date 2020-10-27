@extends('layouts.app')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <td>Apply</td>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>{{ $test->name }}</td>
                <td>@if($test->status == 1) {{ "Active" }} @endif</td>
                <td><a href="/test/start/{{ $test->id }}">Apply</a></td>
            </tr>
        @endforeach    
            </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <td>Apply</td>
            </tr>
        </tfoot>
    </table>

@endsection
