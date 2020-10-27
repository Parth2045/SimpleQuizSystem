@extends('layouts.app')

@section('content')

    <a href="/test/create" class="btn btn-success">Add Test</a>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Add Question</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>{{ $test->name }}</td>
                <td>{{ $test->status }}</td>
                <td><a href="/question/create/">Add Questions</a></td>
                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
            </tr>
        @endforeach    
            </tbody>
        <tfoot>
            <tr>
            <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Add Question</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

@endsection
