<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Question;
use App\Solution;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mailIndex()
    {
        return view('management.mailIndex');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfUser=count(User::all());
        $numberOfQuestion=count(Question::all());
        $numberOfSolution=count(Solution::all());
        $numberOfComment=count(Comment::all());
        return view('admin.index', ['nou'=>$numberOfUser, 'noq'=>$numberOfQuestion, 'nos'=>$numberOfSolution, 'noc'=>$numberOfComment]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function questionVisibility(Request $request)
    {
        $visibility=Question::where('slug','=',$request->slug)->get()->first();
        if($visibility->visibility) {
            Question::where('slug', $request->slug)->update(['visibility' => '0']);
        }
        else {
            Question::where('slug', $request->slug)->update(['visibility' => '1']);
        }
        return redirect()->back();
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
        //
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
