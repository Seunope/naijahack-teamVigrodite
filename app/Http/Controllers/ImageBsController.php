<?php

namespace App\Http\Controllers;

use App\Http\Repository\ImageB_Repository;
use Illuminate\Http\Request;
use App\ImageB;
use App\Http\Requests;

class ImageBsController extends Controller
{
    /**
     * AdminQimagesController constructor.
     * @param $imageB
     */
    public function __construct(ImageB_Repository $imageBRepository)
    {
        $this->imageB = $imageBRepository;
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
        $isSaved=$this->imageB->store($request);
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
        $imageB=ImageB::where('slug',$slug)->get()->first();
        return view('management.imageB.edit',['imageB'=>$imageB]);
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
        $status=$this->imageB->update( $request, $slug);
        $image=   ImageB::whereSlug($slug)->get()->first();
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
        $image = ImageB::whereSlug($slug)->get()->first();
        $status = $this->imageB->destroy($slug);
        return redirect('admin/questions/'.$image->optionB->question->slug)->with('status', 'Image deleted successfully');
    }
}
