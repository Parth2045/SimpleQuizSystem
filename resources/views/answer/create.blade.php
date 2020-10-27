@extends('layouts.app')

@section('content')

  <div class="form-group">
    <label for="question">Answers</label>
  </div>
  
  <div class="main">
      <div class="col-md-4">
      </div>
          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#menu1">MCQ</a></li>
              <li><a data-toggle="tab" href="#menu2">TRUE / FALSE</a></li>
              <li><a data-toggle="tab" href="#menu3">Numeric</a></li>
              <li><a data-toggle="tab" href="#menu4">Order Arrangement</a></li>
              <li><a data-toggle="tab" href="#menu5">Description</a></li>
            </ul>

            <div class="tab-content">

              <div id="menu1" class="tab-pane fade in active">
                <form action="/answer/store" method="post">
                  @csrf
                <div class="form-group">
                  <label for="question">Question</label>
                  <select name="question_id" class="form-control" id="test" required>
                      <option value="">--SELECT--</option>
                      @foreach($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                      @endforeach
                  </select>
                </div>
                  <input type="hidden" name="mcq" value="1">
                    <p>
                      <label>Choice #1: </label>
                      <input required type="text" name="choice[]" />
                    </p>
                    <p>
                      <label>Choice #2: </label>
                      <input required type="text" name="choice[]" />
                    </p>
                    <p>
                      <label>Choice #3: </label>
                      <input required type="text" name="choice[]" />
                    </p>
                    <p>
                      <label>Choice #4: </label>
                      <input required type="text" name="choice[]" />
                    </p>
                    <p>
                      <label>Correct choice number </label>
                      <input required type="number" name="correct_choice" />
                    </p>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
              </div>
            
              <div id="menu2" class="tab-pane fade">
                <form action="/answer/store" method="post">
                  <div class="form-group">
                    <label for="question">Question</label>
                    <select name="question_id" class="form-control" id="test" required>
                        <option value="">--SELECT--</option>
                        @foreach($questions as $question)
                          <option value="{{ $question->id }}" selected>{{ $question->question }}</option>
                        @endforeach
                    </select>
                  </div>
                @csrf
                  <input type="hidden" name="tnf" value="1">
                  <p>
                    <input required type="radio" name="choice" value="T" checked />
                    <label>True </label>
                  </p>
                  <p>
                    <input required type="radio" name="choice" value="F" />
                    <label>False </label>
                  </p>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>


              <div id="menu3" class="tab-pane fade">
              <form action="/answer/store" method="post">
                  @csrf
                <div class="form-group">
                  <label for="question">Question</label>
                  <select name="question_id" class="form-control" id="test" required>
                      <option value="">--SELECT--</option>
                      @foreach($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                      @endforeach
                  </select>
                </div>
                  <input type="hidden" name="numeric" value="1">
                    <p>
                      <label>Choice #1: </label>
                      <input required type="number" name="numeric_choice[]" />
                    </p>
                    <p>
                      <label>Choice #2: </label>
                      <input required type="number" name="numeric_choice[]" />
                    </p>
                    <p>
                      <label>Choice #3: </label>
                      <input required type="number" name="numeric_choice[]" />
                    </p>
                    <p>
                      <label>Choice #4: </label>
                      <input required type="number" name="numeric_choice[]" />
                    </p>
                    <p>
                      <label>Correct choice number </label>
                      <input required type="number" name="correct_choice" />
                    </p>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>

              <div id="menu4" class="tab-pane fade">
                <form action="/answer/store" method="post">
                <div class="form-group">
                  <label for="question">Question</label>
                  <select name="question_id" class="form-control" id="test" required>
                      <option value="">--SELECT--</option>
                      @foreach($questions as $question)
                        <option value="{{ $question->id }}" selected>{{ $question->question }}</option>
                      @endforeach
                  </select>
                </div>
                @csrf
                  <input type="hidden" name="order_arrangement" value="1">
                  <p>
                    <label>Choice #1: </label>
                  <input required type="text" name="choice_order[]" />
                  </p>
                  <p>
                    <label>Choice #2: </label>
                  <input required type="text" name="choice_order[]" />
                  </p>
                  <p>
                    <label>Choice #3: </label>
                  <input required type="text" name="choice_order[]" />
                  </p>
                  <p>
                    <label>Choice #4: </label>
                  <input required type="text" name="choice_order[]" />
                  </p>
                  <p>
                    <label>Add Correct Order</label>
                  <input required type="text" name="order" placeholder="eg. 1,3,2,4" />
                  </p>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
            

              <div id="menu5" class="tab-pane fade">
              <form action="/answer/store" method="post">
              @csrf
              <div class="form-group">
                <label for="question">Question</label>
                <select name="question_id" class="form-control" id="test" required>
                    <option value="">--SELECT--</option>
                    @foreach($questions as $question)
                      <option value="{{ $question->id }}" selected>{{ $question->question }}</option>
                    @endforeach
                </select>
              </div>
                <input type="hidden" name="description" value="1">
                <p>
                  <label>Choice #1: </label>
                  <textarea name="desc_ans[]" required id="" cols="10" rows="10"></textarea>
                </p>
                <p>
                  <label>Choice #2: </label>
                  <textarea name="desc_ans[]" required id="" cols="10" rows="10"></textarea>
                </p>
                <p>
                  <label>Choice #3: </label>
                  <textarea name="desc_ans[]" required id="" cols="10" rows="10"></textarea>
                </p>
                <p>
                  <label>Choice #4: </label>
                  <textarea name="desc_ans[]" required id="" cols="10" rows="10"></textarea>
                </p>
                <p>
                  <label>Select Correct Description</label>
                  <input type="number" name="correct_desc_ans" required />
                </p>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>

            </div>
          </div>
@endsection