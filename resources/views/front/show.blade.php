@extends('layouts.app')

@section('content')

<form action="/test/store/{{ $q_bank['questions'][0]['test_id'] }}" method="post">
@csrf
    
    <div class="container">
    @foreach($q_bank['questions'] as $question)
      <div class="row pb-4">
        <div class="col-6 offset-2">
          Question ID : {{ $question['id'] }}
          <p>{{ $question['question'] }}</p>
          ANSWERS : 
            <?php 
              foreach($q_bank['answers'] as $answers){
                foreach($answers as $ans){
                  if($ans['question_id'] == $question['id'])
                  {
                    if($ans['question_type'] == "description")
                    { ?>
                      <input type="radio" name="question[{{ $question['id'] }}]" value="{{ $ans['id'] }}">{{ $ans['answer'] }}
              <?php } 
                    if($ans['question_type'] == "MCQ")
                    { ?>
                      <input type="radio" name="question[{{ $question['id'] }}]" value="{{ $ans['id'] }}">{{ $ans['answer'] }}
              <?php }
                    if($ans['question_type'] == "Numeric")
                    { ?>
                      <input type="radio" name="question[{{ $question['id'] }}]" value="{{ $ans['id'] }}">{{ $ans['answer'] }}
              <?php }
                    if($ans['question_type'] == "order_arrangement")
                    { ?>
                      <input type="radio" name="question[{{ $question['id'] }}]" value="{{ $ans['id'] }}">{{ $ans['answer'] }}
              <?php }
                    if($ans['question_type'] == "TF")
                    { ?>
                      <input type="radio" name="question[{{ $question['id'] }}]" value="{{ $ans['id'] }},T,is_TF">True
                      <input type="radio" name="question[{{ $question['id'] }}]" value="{{ $ans['id'] }},F,is_TF">False
              <?php }
                    ?>
                      
                      <!-- <input type="checkbox" name="answers[{{ $ans['question_id'] }}][]"> {{ $ans['answer'] }} -->
            <?php }
                }
              }
            ?>
        </div>
      </div>
    @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection