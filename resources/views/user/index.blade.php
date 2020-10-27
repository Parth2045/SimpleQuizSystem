@extends('layouts.app')

@section('content')

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Is Admin</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin }}</td>
            </tr>
        @endforeach    
            </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Is Admin</th>
            </tr>
        </tfoot>
    </table>

@endsection
