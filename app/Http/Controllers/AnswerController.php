<?php

namespace App\Http\Controllers;

use App\Test;
use App\Question;
use App\Anwser;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = \App\Answer::all();
        return view('answer.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::orderBy('id', 'DESC')->get();
        return view('answer.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(isset($data['order_arrangement']) && isset($data['choice_order'])){
            $order_array = explode(",", $data['order']);

            for($i=0; $i<count($data['choice_order']); $i++){
                $answer = new \App\Answer();
                $answer->question_id = $data['question_id'];
                $answer->answer = $data['choice_order'][$i];
                $answer->is_true = $order_array[$i];
                $answer->question_type = "order_arrangement";
                $answer->save();
            }

        } else if(isset($data['description']) && is_array($data['desc_ans'])) {
            $correct_answer = array();

            foreach(array_flip($data['desc_ans']) as $choice) {

                if(($data['correct_desc_ans']-1) == $choice){
                    $correct_answer[] = 1;
                } else {
                    $correct_answer[] = 0;
                }
            }

            for($i=0; $i<count($data['desc_ans']); $i++){
                $answer = new \App\Answer();
                $answer->question_id = $data['question_id'];
                $answer->answer = $data['desc_ans'][$i];
                $answer->is_true = $correct_answer[$i];
                $answer->question_type = "description";
                $answer->save();
            }
        }
        else if(isset($data['tnf']) && !is_array($data['choice'])) {
            if(!is_array($data['choice'])){
                $answer = new \App\Answer();
                $answer->question_id = $data['question_id'];
                $answer->answer = $data['choice'];
                $answer->is_true = (($data['choice'] == "T") ? 1 : "");
                $answer->question_type = "TF";
                $answer->save();
            }
        } else if(isset($data['mcq']) && is_array($data['choice'])){
            $correct_answer = array();
            foreach(array_flip($data['choice']) as $choice) {
                if(($data['correct_choice']-1) == $choice){
                    $correct_answer[] = 1;
                } else {
                    $correct_answer[] = 0;
                }
            }

            for($i=0; $i<count($data['choice']); $i++){
                $answer = new \App\Answer();
                $answer->question_id = $data['question_id'];
                $answer->answer = $data['choice'][$i];
                $answer->is_true = $correct_answer[$i];
                $answer->question_type = "MCQ";
                $answer->save();
            }
        }
        else if(isset($data['numeric']) && is_array($data['numeric_choice'])){
            $correct_answer = array();
            foreach(array_flip($data['numeric_choice']) as $choice) {
                if(($data['correct_choice']-1) == $choice){
                    $correct_answer[] = 1;
                } else {
                    $correct_answer[] = 0;
                }
            }

            for($i=0; $i<count($data['numeric_choice']); $i++){
                $answer = new \App\Answer();
                $answer->question_id = $data['question_id'];
                $answer->answer = $data['numeric_choice'][$i];
                $answer->is_true = $correct_answer[$i];
                $answer->question_type = "Numeric";
                $answer->save();
            }
            
        } else {
            echo "Invalid Operation";
        }

        return redirect('/answer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
