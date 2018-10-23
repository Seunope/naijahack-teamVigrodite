<?php

namespace App\Http\Controllers;

use App\Http\Repository\ImageA_Repository;
use App\ImageA;
use Illuminate\Http\Request;

use App\Http\Requests;

class ImageAsController extends Controller
{
    private $imageA;

    /**
     * AdminQimagesController constructor.
     * @param $imageA
     */
    public function __construct(ImageA_Repository $imageARepository)
    {
        $this->imageA = $imageARepository;
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
        $isSaved=$this->imageA->store($request);
        return redirect()->back()->with('status', $request->label.' added successfully');
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
        $imageA=ImageA::where('slug',$slug)->get()->first();
        return view('management.imageA.edit',['imageA'=>$imageA]);
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
        $status=$this->imageA->update( $request, $slug);
        $image=   ImageA::whereSlug($slug)->get()->first();
        return redirect()->back()->with('status', $request->label.' updated successfully');
        // return $status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $image = ImageA::whereSlug($slug)->get()->first();
        $status = $this->imageA->destroy($slug);
        return redirect('admin/questions/'.$image->optionA->question->slug)->with('status', 'Image deleted successfully');
    }
}
