<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OptionC;
use App\Question;
use Auth;
use App\Http\Requests;

class OptionCsController extends Controller
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
        $optionC                     =   new OptionC();
        $optionC->body               =   $request->body;
        $optionC->user_id               =   Auth::user()->id;
        $optionC->question_id          =   $request->question_id;
        $optionC->slug               =   uniqid();
        $isSaved                      =   $optionC->save();
        return redirect()->back()->with('status', 'OptionC saved successfully');
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
        $optionC                 =   OptionC::whereSlug($slug)->get()->first();
        $optionC->body               =   $request->body;
        $optionC->edited               =   1;
        $isUpdated                  =   $optionC->update();
        return redirect()->back()->with('status', 'OptionC edited successfully');

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
