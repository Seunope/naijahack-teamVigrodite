<?php

namespace App\Http\Controllers;

use App\Http\Repository\CommentRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCommentsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses    = Course::lists('code', 'id')->all();
        $years      = Year::lists('name', 'id')->all();
        $topics = Topic::lists('name', 'id')->all();
//        return response()->json($courses);
        return view('admin.questions.create', ['courses'=>$courses, 'years'=>$years, 'topics'=>$topics]);
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
            'body' => 'required',
        ]);
        $isSaved=$this->comment->store($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($slug)
//    {
//        $solution=$this->solution->show($slug);
////        return response()->json($solution);
//        return view('admin.questions.show',['solution'=>$solution]);
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $comment   =   $this->comment->edit($slug);
//        return response()->json($solution);
        return view('admin.comments.edit', ['comment'=>$comment]);
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
        $this->validate($request, [
            'body' => 'required',
        ]);
        $isUpdate=$this->comment->update( $request, $slug);
//        return response()->json($isUpdate);
        return redirect()->back()->with('status', 'Your comment was updated successfully');
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
       return redirect()->back()->with('status', 'Solution deleted successfully');
    }
}
