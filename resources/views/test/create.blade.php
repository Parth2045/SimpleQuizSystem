@extends('layouts.app')

@section('content')

<form action="/test/store" method="post">
@csrf
  <div class="form-group">
    <label for="name">Test Name</label>
    <input type="name" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="name">Status</label>
    <select name="status" class="form-control" id="status" required>
        <option value="1" selected>Active</option>
        <option value="0">Inactive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection