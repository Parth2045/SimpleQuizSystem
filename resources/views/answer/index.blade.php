@extends('layouts.app')

@section('content')

    <a href="/answer/create" class="btn btn-success">Add Answer</a>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question Id</th>
                <th>Question Type</th>
                <th>Answer</th>
                <th>Correct Answer</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($answers as $answer)
            <tr>
                <td>{{ $answer->id }}</td>
                <td>{{ $answer->question_id }}</td>
                <td>{{ $answer->question_type }}</td>
                <td>{{ $answer->answer }}</td>
                <td>{{ $answer->is_true }}</td>
                <!-- <td><a href="{{ $answer->id }}">Edit</a> | <a href="{{ $answer->id }}">Delete</a></td> -->
            </tr>
        @endforeach  
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Question Id</th>
                <th>Question Type</th>
                <th>Answer</th>
                <th>Correct Answer</th>
                <!-- <th>Action</th> -->
            </tr>
        </tfoot>
    </table>

@endsection
