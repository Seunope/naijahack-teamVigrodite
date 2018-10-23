<?php

namespace App\Http\Controllers;

use App\Http\Repository\QuestionRepository;
use App\Year;
use Auth;
use Illuminate\Http\Request;
use App\OptionA;
use App\OptionB;
use App\OptionC;
use App\Course;
use App\OptionD;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminQuestionsController extends Controller
{
    private $question;
    /**
     * AdminQuestionsController constructor.
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->question = $questionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($courseSlug, $yearSlug)
    {
        $data = $this->question->index($courseSlug, $yearSlug);
        return view('admin.questions.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::lists('code', 'id')->all();
        $years = Year::lists('name', 'id')->all();
        $topics = Topic::lists('name', 'id')->all();
//        return response()->json($courses);
        return view('admin.questions.create', ['courses' => $courses, 'years' => $years, 'topics'=>$topics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isSaved = $this->question->store($request);
        Session::flash('status', 'Question '. $request->number.' added succesfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $question = $this->question->show($slug);
        $question = $this->question->show($slug);
        $optionA=OptionA::where('question_id',$question->id)->get()->first();
        $optionB=OptionB::where('question_id',$question->id)->get()->first();
        $optionC=OptionC::where('question_id',$question->id)->get()->first();
        $optionD=OptionD::where('question_id',$question->id)->get()->first();
        $data=[
            'question'=>$question,
            'optionA'=>$optionA,
            'optionB'=>$optionB,
            'optionC'=>$optionC,
            'optionD'=>$optionD
        ];
//        return response()->json($question);
        return view('admin.questions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $question = $this->question->edit($slug);
//        return response()->json($question);
        return view('admin.questions.edit', ['question' => $question]);
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
        $isUpdate = $this->question->update($request, $slug);
//        return response()->json($isUpdate);
        return redirect('admin/questions/'.$request->question_slug)->with('status', 'Question updated successfully');            // return $status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $status = $this->question->destroy($slug);
//        return response()->json(['message'=>$status]);
        return redirect('/admin/courses')->with('status', 'Question deleted successfully');
    }

}
