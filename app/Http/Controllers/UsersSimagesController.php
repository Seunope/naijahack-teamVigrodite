<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solution;
use App\Http\Repository\SimageRepository;
use Auth;
use App\Http\Requests;

class UsersSimagesController extends Controller
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
    public function create($slug)
    {
        $solution=Solution::where('slug',$slug)->get()->first();
        return view('general.simages.create',['solution'=>$solution]);
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
        return redirect('/general/questions/'.$request->question_slug)->with('status', 'Image uploaded successfully');
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
        return view('general.simages.edit',['sfig'=>$sfig]);
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
        return redirect('/general/questions/'.$request->question_slug)->with('status', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $status = $this->simage->destroy($slug);
//            return response()->json(['message'=>$status]);
//            return redirect()->back()->with('status', 'Image deleted successfully');
        return redirect('/general/questions/'.$request->question_slug)->with('status', 'Image deleted successfully');
    }
}
