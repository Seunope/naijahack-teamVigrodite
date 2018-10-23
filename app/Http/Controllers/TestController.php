<?php

namespace App\Http\Controllers;

use App\Course;
use App\Faculty;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\QuestionRepository;
use App\Http\Repository\TestRepository;
use App\Question;
use App\Result;
use App\School;
use App\Year;
use App\Test;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

class TestController extends Controller
{
    private $course;
    private $questions;
    private $test;

    /**
     * UsersController constructor.
     */
    public function __construct(CourseRepository $courseRepository, QuestionRepository $questionRepository, TestRepository $testRepository)
    {
        $this->test  =$testRepository;
        $this->course = $courseRepository;
        $this->questions =$questionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->test->index();
        return view('test.selection',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        $review=Test::where('user_id',Auth::user()->id)->get()->first();
        $ray=explode(',',$review->questionIds);
        $questions = Question::find($ray);
        $result=Result::where('test_id',$review->id)->get()->first();
        $course=Course::where('id',$result->course_id)->get()->first();
        $data=['questions'=>$questions,'num'=>1,'nim'=>0,'nom'=>0,'review'=>$review,'course'=>$course,'result'=>$result];
        return view('test.review', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
//        $data=[
//            'title'=>'CBT TEST ATTEMPT',
//            'content'=>Auth::user()->name.' Attempted a CBT test',
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('log@sol.ng', '')->subject('CBT TEST ATTEMPT');
//        }
//        );
        Test::where('user_id',Auth::user()->id)->delete();
        if($request->yearSlug!=0)
        {
            $course = Course::where('slug', '=', $request->courseSlug)->get()->first();
            $year = Year::where('slug', '=', $request->yearSlug)->get()->first();
            $questions = $this->questions->cbtByCourseAndYear($course->id, $year->id, $request->number);
            if($questions=='0'){return redirect()->back()->with('warning','The number of question in stock is not up to the number of questions you requested for, please choose lesser number of question as more question is currently being uploaded, or choose another year. Thanks ');}
            $answers=''; $questionIds='';
            foreach ($questions as $question){
                $questionIds=$questionIds.$question->id.',';
                $correctOption = \DB::table("correct_options")->where("question_id", $question->id)->first();
                $answers=$answers.$correctOption->correctOption;
            }
            $test                     =   new Test();
            $test->user_id               =   Auth::user()->id;
            $test->correctOptions          =   $answers;
            $test->questionIds          =  $questionIds;
            $test->slug               =   uniqid();
            $isSaved                      =   $test->save();
            $data=['numberOfQuestion'=>count($questions),'testId'=>$test->id,'course' => $course,'num'=>1, 'year' => $year,'time'=>$request->time, 'questions' => $questions,'number'=>$request->number];
            return view('test.test', $data);
        }
        else
        {
            $course = Course::where('slug', '=', $request->courseSlug)->get()->first();
            $questions = $this->questions->cbtByCourseOnly($course->id,$request->number);
            if($questions=='0'){return redirect()->back()->with('warning','The number of question in stock is not up to the number of questions you requested for, please choose lesser number of question as more question is currently being uploaded, or choose another year. Thanks ');}
            $answers=''; $questionIds='';
            foreach ($questions as $question){
                $questionIds=$questionIds.$question->id.',';
                $correctOption = \DB::table("correct_options")->where("question_id", $question->id)->first();
                $answers=$answers.$correctOption->correctOption;
            }
            $test                     =   new Test();
            $test->user_id               =   Auth::user()->id;
            $test->correctOptions          =   $answers;
            $test->questionIds          =  $questionIds;
            $test->slug               =   uniqid();
            $isSaved                      =   $test->save();
            $data=['numberOfQuestion'=>count($questions),'testId'=>$test->id,'course' => $course,'num'=>1,'time'=>$request->time, 'questions' => $questions,'number'=>$request->number];
            return view('test.test', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitTest(Request $request)
    {
        $num=$request->questionNumber;
        for ($i=1;$i<=$num;$i++)
        {
            $numbers[]=$i;
        }
        $selectedOption='';
        foreach ($numbers as $number)
        {
            $incomingOption='option'.$number;
            if ($request->$incomingOption==null)
            {
                $incomingOption='-';
            }
            else
            {
                $incomingOption=$request->$incomingOption;
            }
            $selectedOption=$selectedOption.$incomingOption;
        }
        Test::where('id','=',$request->testId)->update(['selectedOptions'=>$selectedOption]);
        $test=  Test::where('id','=',$request->testId)->get()->first();
        $arrayOfCorrect=str_split($test->correctOptions);
        $arrayOfSelected=str_split($test->selectedOptions);
        $counter=0;
        for ($i=0;$i<=$num-1;$i++)
        {
            if($arrayOfCorrect[$i]==$arrayOfSelected[$i])
            {
                $counter=$counter+1;
            }
        }
        $result                     =   new Result();
        $result->user_id               =   Auth::user()->id;
        $result->score          =   $counter;
        $result->overall          =   $num;
        $result->course_id          =  $request->courseId;
        $result->test_id          =  $request->testId;
        $result->year_id          =  $request->yearId;
        $result->slug               =   uniqid();
        $isSaved                      =   $result->save();
        return view('test.isReview',['score'=>$counter,'overAll'=>$num]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        Test::where('id',$id)->update(['selectedOptions'=>$request->selectedOptions]);
        return redirect('/404');
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
