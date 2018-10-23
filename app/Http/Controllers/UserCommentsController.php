<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\CommentRepository;

use App\Http\Requests;

class UserCommentsController extends Controller
{


    private $comment;

    /**
     * AdminCommentsController constructor.
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->comment = $commentRepository;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isSaved=$this->comment->store($request);
        return redirect()->back()->with('status', 'Your comment was posted successfully');
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
    public function edit($id)
    {
        $comment   =   $this->comment->edit($id);
//        return response()->json($solution);
        return view('users.comments.edit', ['comment'=>$comment]);
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
        $isUpdate=$this->comment->update( $request, $slug);
//        return response()->json($isUpdate);
        return redirect()->back()->with('status', 'Your comment was edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $status = $this->comment->destroy($request, $slug);
        // return response()->json(['message'=>$status]);
       return redirect()->back()->with('status', 'Your comment deleted successfully');
    }
}
