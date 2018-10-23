<?php

namespace App\Http\Controllers;

use App\Http\Repository\SolutionRepository;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Http\Requests;

class AdminSolutionsController extends Controller
{
    private $solution;

    /**
     * AdminSolutionsController constructor.
     * @param $solution
     */
    public function __construct(SolutionRepository $solutionRepository)
    {
        $this->solution = $solutionRepository;
    }

    /**
     * Show the form for creating a solution to a particular question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $question=Question::where('slug',$slug)->get()->first();
        return view('admin.solutions.create',['question'=>$question]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isSaved=$this->solution->store($request);
        return redirect()->back()->with('status', 'Solution saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($slug)
//    {
//    if (Auth::check()) {
//        $solution=$this->solution->show($slug);
////        return response()->json($solution);
//        return view('admin.questions.show',['solution'=>$solution]);
    // }
        // else
            // Session::flash('status','Please login first');
            // return redirect('/login');
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $solution   =   $this->solution->edit($slug);
//        return response()->json($solution);
        return view('admin.solutions.edit', ['solution'=>$solution]);
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
        $data=$this->solution->update( $request, $slug);
        $isUpdated=$data['isUpdated'];
        $solution=$data['solution'];
        return redirect('/admin/questions/'.$solution->question->slug)->with('status', 'Solution updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $data = $this->solution->destroy($request, $slug);
        $status=$data['status'];
        $question=$data['question'];
       return redirect('/admin/questions/'.$question->slug)->with('status', 'Solution deleted successfully');
    }
}
