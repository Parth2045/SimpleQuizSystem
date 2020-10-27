@extends('layouts.app')

@section('content')

<form action="/test/update/{{$test->id}}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Test Name</label>
    <input type="name" class="form-control" id="name" name="name" value="{{ $test->name }}" required>
  </div>
  <div class="form-group">
    <label for="name">Status</label>
    <select name="status" class="form-control" id="status" required>
        <option value="1" <?php if($test->status == 1 ){ echo "selected"; }?>>Active</option>
        <option value="0" <?php if($test->status == 0 ){ echo "selected"; }?>>Inactive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection