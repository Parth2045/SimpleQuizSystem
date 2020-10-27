<?php

namespace App\Http\Controllers\Front;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use App\Test;
use DB;
use App\Quiz;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = DB::table('tests')->where('status', '1')->get();
        return view('front.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTest(Request $request, $test)
    {
        $data = $request->all();

        $correctAnswerCount = 0;
        $incorrectAnswerCount = 0;
        $countTotalQuestions = DB::select(" SELECT count(test_id) AS test_question_count FROM questions WHERE test_id = '".$test."' ");

        foreach($data['question'] as $k_question => $v_answer)
        {
            $TF_ans = explode(",", $v_answer);
            if(isset($TF_ans[2]) &&$TF_ans[2] ==  "is_TF"){
                $answer = DB::table('answers')
                ->select('answers.*')
                ->leftJoin('questions', 'questions.id', '=', 'answers.question_id')
                ->where('answers.id', '=', $TF_ans[0])
                ->where('answers.question_id', '=', $k_question)
                ->where('answers.answer', '=', trim($TF_ans[1]))
                ->where('answers.is_true', '=', 1)
                ->get();

                if(isset($answer[0]->is_true)){
                    $correctAnswerCount += 1;
                } else {
                    $incorrectAnswerCount += 1;
                }

            } else {
                $answer = DB::table('answers')
                ->select('answers.*')
                ->leftJoin('questions', 'questions.id', '=', 'answers.question_id')
                ->where('answers.id', '=', $v_answer)
                ->where('answers.question_id', '=', $k_question)
                ->where('answers.is_true', '=', 1)
                ->get();

                if(isset($answer[0]->is_true)){
                    $correctAnswerCount += 1;
                } else {
                    $incorrectAnswerCount += 1;
                }

            }            
        }

        $quizCount = Quiz::where('user_id', '=', auth()->user()->id)->where('test_id', '=', $test)->latest()->first();
        if(isset($quizCount->attempt_count) && ($quizCount->attempt_count >= 1)){

            $updateQuizCount =  new Quiz;

            $updateQuizCount->user_id = auth()->user()->id;
            $updateQuizCount->test_id = $test;
            $updateQuizCount->correct = $correctAnswerCount;
            $updateQuizCount->incorrect = $incorrectAnswerCount;
            $updateQuizCount->total_attempted = ($correctAnswerCount + $incorrectAnswerCount);
            $updateQuizCount->total_question = $countTotalQuestions[0]->test_question_count;
            $updateQuizCount->is_attempted = 1;
            $updateQuizCount->attempt_count = $quizCount->attempt_count + 1;
            $updateQuizCount->save();

        } else {

            $quiz = new Quiz;
            $quiz->user_id = auth()->user()->id;
            $quiz->test_id = $test;
            $quiz->correct = $correctAnswerCount;
            $quiz->incorrect = $incorrectAnswerCount;
            $quiz->total_attempted = ($correctAnswerCount + $incorrectAnswerCount);
            $quiz->total_question = $countTotalQuestions[0]->test_question_count;
            $quiz->is_attempted = 1;
            $quiz->attempt_count = 1;
    
            $quiz->save();    
        }

        return redirect('/tests')->with('msg','Your Test Is Submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkAppliedExam = Quiz::where('user_id', '=', auth()->user()->id)
                            ->where('test_id', '=', $id)
                            ->orderBy('id', 'DESC')
                            ->get();

        if(isset($checkAppliedExam[0]->id))
        {
            if(($checkAppliedExam[0]->attempt_count >= 3)){
                return redirect('/tests')->with('msg','Your attempts(max 3) for this test are over.');
            }
            return redirect('/tests')->with('msg','Your already given this test, Please wait until the your test is being reset.');
        }
        
        $q_bank = array();
        
        $testQuestions = DB::table('questions')
                ->select('questions.*','answers.question_type')
                ->where('questions.test_id', '=', $id)
                ->leftJoin('answers', 'answers.question_id', '=', 'questions.id')
                ->groupBy('answers.question_type')
                ->get();

        $testQuestions = json_decode($testQuestions, true);

        if(empty($testQuestions)){
            return redirect('/tests')->with('msg','Your exam is not started yet.');
        }

        $q_bank['questions'] = $testQuestions;

        foreach($testQuestions as $testQuestion){
            $testAnswers = DB::table('answers')
            ->where('answers.question_id', '=', $testQuestion['id'])
            ->get();

            $q_bank['answers'][] = json_decode($testAnswers, true);
        }

        return view('front.show', ['q_bank' => $q_bank]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();

        return redirect('/test');
    }
}
