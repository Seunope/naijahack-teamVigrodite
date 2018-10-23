<?php

namespace App\Http\Controllers;

use App\Http\Repository\CimageRepository;
use Illuminate\Http\Request;
use App\Cimage;
use App\Comment;
use Auth;
use Validator;
use App\Http\Requests;

class AdminCimagesController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
            $comment=Comment::where('slug',$slug)->get()->first();
            return view('admin.cimages.create',['comment'=>$comment]);
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
            $comment= Comment::where('id',$request->comment_id)->get()->first();
            $question=$comment->question->slug;
            // return $question;
            return redirect('admin/questions/'.$question)->with('status', $request->label.' added successfully');
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
     * Show the form for editing the Comment image resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
            $cimage=cimage::where('slug',$slug)->get()->first();
            return view('admin.cimages.edit',['cimage'=>$cimage]);
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
            $image=   Cimage::where('slug',$slug)->get()->first();
            $question=$image->comment->question->slug;
            return redirect('admin/questions/'.$question)->with('status', $request->label.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
            $status = $this->cimage->destroy($slug);
            // return response()->json(['message'=>$status]);
            return redirect()->back();
    }
}
