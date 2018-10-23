<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\SolutionRepository;
use App\Http\Requests;

class UsersSolutionsController extends Controller
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
        $isSaved=$this->solution->store($request);
        return redirect()->back()->with('status', 'Solution uploaded successfully');
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
        $data=$this->solution->update( $request, $slug);
//        return response()->json($isUpdate);
        return redirect()->back()->with('status', 'Solution updated successfully');
    }

}
