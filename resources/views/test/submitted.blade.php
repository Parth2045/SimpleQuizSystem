@extends('layouts.app')

@section('content')

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Test Name</th>
                <th>Correct</th>
                <th>Incorrect</th>
                <th>Total Question</th>
                <th>Total Attempted</th>
                <th>Is Attempted?</th>
                <th>Attempt Count</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>{{ $test->user_id }}</td>
                <td>{{ $test->test_id }}</td>
                <td>{{ $test->correct }}</td>
                <td>{{ $test->incorrect }}</td>
                <td>{{ $test->total_question }}</td>
                <td>{{ $test->total_attempted }}</td>
                <td>{{ $test->is_attempted }}</td>
                <td>{{ $test->attempt_count }}</td>
                <td><a href="/tests/submitted/{{ $test->id }}">Edit</a> | <a href="#">Delete</a></td>
            </tr>
        @endforeach
            </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Test Name</th>
                <th>Correct</th>
                <th>Incorrect</th>
                <th>Total Question</th>
                <th>Total Attempted</th>
                <th>Is Attempted?</th>
                <th>Attempt Count</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

@endsection
