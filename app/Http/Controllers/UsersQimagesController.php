<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\QimageRepository;
use App\Question;
use Auth;
use App\Qimage;
use App\Http\Requests;

class UsersQimagesController extends Controller
{
    private $qimage;

    /**
     * AdminQimagesController constructor.
     * @param $qimage
     */
    public function __construct(QimageRepository $qimageRepository)
    {
        $this->qimage = $qimageRepository;
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
        $question=Question::where('slug',$slug)->get()->first();
        return view('general.qimages.create',['question'=>$question]);
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
        $isSaved = $this->qimage->store($request);
        return redirect('/general/questions/'.$request->question_slug)->with('status',' image added successfully');
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
        $qimage=Qimage::where('slug',$slug)->get()->first();
        return view('general.qimages.edit', ['qimage' => $qimage]);
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
        $status=$this->qimage->update( $request, $slug);
        $image=   Qimage::whereSlug($slug)->get()->first();
        $question=$image->question->slug;
        return redirect('general/questions/'.$question)->with('status', $request->label.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $status = $this->qimage->destroy($slug);
//        return response()->json(['message'=>$status]);
        return redirect('/general/questions/'.$request->question_slug)->with('status', 'Image deleted successfully');
    }
}
