<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Anwser;
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
        $tests = Test::all();
        return view('test.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
        //
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
        $test = Test::create($data);

        return redirect('/test');
    }

    public function showSubmittedTest()
    {
        $tests = Quiz::all();

        return view('test.submitted', compact('tests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);
        return view('test.edit', compact('test'));
        
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
        $test = Test::find($id);
        $test->name = $request['name'];
        $test->status = $request['status'];
        
        $test->save();
        return redirect('/test');
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

    public function submittedEdit($test){
        $quiz = Quiz::find($test);
        return view('test.submitted-edit', compact('quiz'));
    }

    public function submittedUpdate(Request $request, $test){

        $data = $request->all();
        $updateAttempt = Quiz::find($test);
        $updateAttempt->is_attempted = $data['is_attempted'];
        $updateAttempt->save();

        return redirect('/tests/submitted');
    }
}
