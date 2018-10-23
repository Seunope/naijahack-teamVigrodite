<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\CimageRepository;
use App\Cimage;
use App\Comment;
use Auth;
use App\Http\Requests;

class UsersCimagesController extends Controller
{
   private $cimage;

    /**
     * AdminCimagesController constructor.
     */
    public function __construct(CimageRepository $cimageRepository)
    {
        $this->cimage =$cimageRepository;
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
        $comment=Comment::where('slug',$slug)->get()->first();
        return view('general.cimages.create',['comment'=>$comment]);
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
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
            $isSaved=$this->cimage->store($request);
            // return $question;
            return redirect('/general/questions/'.$request->question_slug)->with('status', 'Image added successfully');
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
            $cimage=cimage::where('slug',$slug)->get()->first();
            return view('general.cimages.edit',['cimage'=>$cimage]);
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
            $status=$this->cimage->update( $request, $slug);
            return redirect('/general/questions/'.$request->question_slug)->with('status', $request->label.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
            $status = $this->cimage->destroy($slug);
            // return response()->json(['message'=>$status]);
        return redirect('/general/questions/'.$request->question_slug)->with('status', 'Image deleted successfully');

    }
}
