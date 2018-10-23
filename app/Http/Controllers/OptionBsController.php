<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OptionB;
use App\Question;
use Auth;
use App\Http\Requests;

class OptionBsController extends Controller
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
        $this->validate($request, [
            'body' => 'required',
        ]);
        $question                       = Question::where('slug', '=', $request->slug)->get()->first();
        $optionB                     =   new OptionB();
        $optionB->body               =   $request->body;
        $optionB->user_id               =   Auth::user()->id;
        $optionB->question_id          =   $request->question_id;
        $optionB->slug               =   uniqid();
        $isSaved                      =   $optionB->save();
        return redirect()->back()->with('status', 'OptionB saved successfully');
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
        $optionB                 =   OptionB::whereSlug($slug)->get()->first();
        $optionB->body               =   $request->body;
        $optionB->edited               =   1;
        $isUpdated                  =   $optionB->update();
        return redirect()->back()->with('status', 'OptionB edited successfully');

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
