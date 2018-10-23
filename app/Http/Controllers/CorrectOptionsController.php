<?php

namespace App\Http\Controllers;

use App\CorrectOption;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;

class CorrectOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $correctOption                 =   new CorrectOption();
        $correctOption->question_id             =   $request->question_id;
        $correctOption->correctOption             =   $request->correctOption;
        $correctOption->slug             =   uniqid();
        Question::where('id',$request->question_id)->update(['IsOption'=>1]);
        $correctOption->save();
        return redirect()->back()->with('status', 'Correct Option saved successfully');

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
    public function update(Request $request, $slug)
    {
        $correctOption                 =   CorrectOption::whereSlug($slug)->get()->first();
        $correctOption->correctOption             =   $request->correctOption;
        $correctOption->update();
        return redirect()->back()->with('status', 'Correct Option saved successfully');
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
