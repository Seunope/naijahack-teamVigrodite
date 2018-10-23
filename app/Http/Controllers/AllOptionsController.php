<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Repository\QuestionRepository;
use App\OptionA;
use App\OptionB;
use App\OptionC;
use App\OptionD;
use App\Course;
use App\CorrectOption;
use App\Question;
use Auth;
use App\Http\Requests;

class AllOptionsController extends Controller
{
    private $question;
    /**
     * AllOptionsController constructor.
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
        if (($request->topic) !=null){
            $topic = Topic::create(['name'=>$request->topic,'course_id'=>$request->course_id, 'user_id'=>Auth::user()->id]);
            $topic_id = $topic->id;
        }
        else {
            $topic_id = $request->topic_id;
        }
        $course=Course::where('id',$request->course_id)->get()->first();
        $question                     =   new Question();
        $question->body               =   $request->body;
        $question->user_id            =   $request->user_id;
        $question->poster_id          =   Auth::user()->id;
        $question->number             =   $request->number;
        if ($course->type==1){$question->type=1;}
        if (isset($request->isExam)){$question->isExam =   $request->isExam;}
        $question->course_id          =   $request->course_id;
        $question->year_id            =   $request->year_id;
        $question->topic_id           =   $topic_id;
        $question->status             =   0;
        $question->slug               =   uniqid();
        $isSaved                      =   $question->save();
        $request->question_id =  $question->id;

        $optionA                     =   new OptionA();
        $optionA->body               =   $request->bodyA;
        $optionA->user_id               =   Auth::user()->id;
        $optionA->question_id          =   $request->question_id;
        $optionA->slug               =   uniqid();
        $isSaved                      =   $optionA->save();

        $optionB                     =   new OptionB();
        $optionB->body               =   $request->bodyB;
        $optionB->user_id               =   Auth::user()->id;
        $optionB->question_id          =   $request->question_id;
        $optionB->slug               =   uniqid();
        $isSaved                      =   $optionB->save();

        $optionC                     =   new OptionC();
        $optionC->body               =   $request->bodyC;
        $optionC->user_id               =   Auth::user()->id;
        $optionC->question_id          =   $request->question_id;
        $optionC->slug               =   uniqid();
        $isSaved                      =   $optionC->save();

        $optionD                     =   new OptionD();
        $optionD->body               =   $request->bodyD;
        $optionD->user_id               =   Auth::user()->id;
        $optionD->question_id          =   $request->question_id;
        $optionD->slug               =   uniqid();
        $isSaved                      =   $optionD->save();

        $correctOption                 =   new CorrectOption();
        $correctOption->question_id             =   $request->question_id;
        $correctOption->correctOption             =   $request->correctOption;
        $correctOption->slug             =   uniqid();
        Question::where('id',$request->question_id)->update(['IsOption'=>1]);
        $correctOption->save();

        return redirect()->back()->with('status', 'All saved successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
