@extends('layouts.app')

@section('content')

<form action="/question/store" method="post">
@csrf

  <div class="form-group">
    <label for="name">Test Name</label>
    <select name="test_id" class="form-control" id="test" required>
        @foreach($tests as $test)
          <option value="{{ $test->id }}" selected>{{ $test->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="question">Question</label>
    <input type="name" class="form-control" id="question" name="question" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection