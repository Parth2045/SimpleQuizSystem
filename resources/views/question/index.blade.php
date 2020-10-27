@extends('layouts.app')

@section('content')

        @if($errors->any())
        <h4 class="alert alert-danger">{{$errors->first()}}</h4>
        @endif

    <a href="/question/create" class="btn btn-success">Add Question</a>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Test ID</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->test_id }}</td>
                <td>{{ $question->question }}</td>
                <td><a href="#">Edit</a> | <a href="/question/{{ $question->id }}">Delete</a></td>
            </tr>
        @endforeach    
            </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Test ID</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

@endsection
