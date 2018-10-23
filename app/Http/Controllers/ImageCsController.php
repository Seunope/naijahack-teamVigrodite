<?php

namespace App\Http\Controllers;

use App\Http\Repository\ImageC_Repository;
use Illuminate\Http\Request;
use App\ImageC;
use App\Http\Requests;

class ImageCsController extends Controller
{
    private $imageC;

    /**
     * AdminQimagesController constructor.
     * @param $imageC
     */
    public function __construct(ImageC_Repository $imageCRepository)
    {
        $this->imageC = $imageCRepository;
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
        $isSaved=$this->imageC->store($request);
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
        $imageC=ImageC::where('slug',$slug)->get()->first();
        return view('management.imageC.edit',['imageC'=>$imageC]);
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
        $status=$this->imageC->update( $request, $slug);
        $image=   ImageC::whereSlug($slug)->get()->first();
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
        $image = ImageC::whereSlug($slug)->get()->first();
        $status = $this->imageC->destroy($slug);
        return redirect('admin/questions/'.$image->optionC->question->slug)->with('status', 'Image deleted successfully');
    }
}
