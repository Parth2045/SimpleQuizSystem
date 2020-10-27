<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Anwser;
use DB;

class QuestionController extends Controller
{
    public function index(){
        $questions = Question::all();
        return view('question.index', compact('questions'));
    }

    public function create(){
        $tests = Test::all();
        return view('question.create', compact('tests'));
    }

    public function store(Request $request){
        $data = $request->all();

        $count = DB::select(" SELECT count(test_id) AS test_question_count FROM questions WHERE test_id = '".$data['test_id']."' ");
        if($count[0]->test_question_count >= 10) {
            return redirect('/question')->withErrors('You can not add more than 10 questions to one test!!');
        }

        $question = Question::create($request->all());
        return redirect('/question');
    }

    public function destroy($question){
        $question = Question::find($question);
        $question->delete();
        return redirect('/question');
    }
}
