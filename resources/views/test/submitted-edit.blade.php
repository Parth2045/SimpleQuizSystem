@extends('layouts.app')

@section('content')

<form action="/tests/submitted/{{$quiz->id}}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Status</label>
    <select name="is_attempted" class="form-control" id="is_attempted" required>
        <option value="1" <?php if($quiz->is_attempted == 1 ){ echo "selected"; }?>> Already Given </option>
        <option value="0" <?php if($quiz->is_attempted == 0 ){ echo "selected"; }?>>Reset</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
