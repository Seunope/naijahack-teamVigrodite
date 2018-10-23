<?php

namespace App\Http\Controllers;

use App\Http\Repository\ImageD_Repository;
use Illuminate\Http\Request;
use App\ImageD;
use App\Http\Requests;

class ImageDsController extends Controller
{
    private $imageD;

    /**
     * AdminQimagesController constructor.
     * @param $imageD
     */
    public function __construct(ImageD_Repository $imageDRepository)
    {
        $this->imageD = $imageDRepository;
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
        $isSaved=$this->imageD->store($request);
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
        $imageD=ImageD::where('slug',$slug)->get()->first();
        return view('management.imageD.edit',['imageD'=>$imageD]);
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
        $status=$this->imageD->update( $request, $slug);
        $image=   ImageD::whereSlug($slug)->get()->first();
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
        $image = ImageD::whereSlug($slug)->get()->first();
        $status = $this->imageD->destroy($slug);
        return redirect('admin/questions/'.$image->optionD->question->slug)->with('status', 'Image deleted successfully');
    }
}
