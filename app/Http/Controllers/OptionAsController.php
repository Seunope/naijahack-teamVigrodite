<?php

namespace App\Http\Controllers;

use App\OptionA;
use App\Question;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class OptionAsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $this->validate($request, [
            'body' => 'required',
        ]);
        $question                       = Question::where('slug', '=', $request->slug)->get()->first();
        $optionA                     =   new OptionA();
        $optionA->body               =   $request->body;
        $optionA->user_id               =   Auth::user()->id;
        $optionA->question_id          =   $request->question_id;
        $optionA->slug               =   uniqid();
        $isSaved                      =   $optionA->save();
        return redirect()->back()->with('status', 'OptionA saved successfully');
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
        $this->validate($request, [
            'body' => 'required',
        ]);
        $optionA                 =   OptionA::whereSlug($slug)->get()->first();
        $optionA->body               =   $request->body;
        $optionA->edited               =   1;
        $isUpdated                  =   $optionA->update();
        return redirect()->back()->with('status', 'OptionA edited successfully');
        
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
