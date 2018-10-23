<?php

namespace App\Http\Controllers;

use App\Http\Repository\SimageRepository;
use App\Solution;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class AdminSimagesController extends Controller
{
    private $simage;

    /**
     * AdminSimagesController constructor.
     */
    public function __construct(SimageRepository $simageRepository)
    {
        $this->simage =$simageRepository;
    }

    /**
     * Show the form to attach a image to a answer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $solution=Solution::where('slug',$slug)->get()->first();
        return view('admin.simages.create',['solution'=>$solution]);
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
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2012',
        ]);
            $isSaved=$this->simage->store($request);
        return redirect('admin/questions/'.$request->question_slug)->with('status', 'Image uploaded successfully');
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
    public function edit($slug)
    {
            $sfig=$this->simage->edit($slug);
            return view('admin.simages.edit',['sfig'=>$sfig]);
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
            $status=$this->simage->update( $request, $slug);
        return redirect('admin/questions/'.$request->question_slug)->with('status', 'Image updated successfully');            // return $status;
    }

    /**
     * delete a selected solution's image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $question_slug=$request->question_slug;
        $status = $this->simage->destroy($slug);
        return redirect('admin/questions/'.$question_slug)->with('status', 'Image deleted successfully');
    }
}
