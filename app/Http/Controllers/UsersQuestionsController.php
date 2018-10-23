<?php

namespace App\Http\Controllers;
use App\Http\Repository\ViewRepository;
use App\Year;
use Auth;
use App\Question;
use App\Course;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Repository\QuestionRepository;
use App\Http\Requests;

class UsersQuestionsController extends Controller
{

    private $question;
    private $view;

    /**
     * AdminQuestionsController constructor.
     * @param QuestionRepository $questionRepository
     * @param ViewRepository $viewRepository
     */
    public function __construct(QuestionRepository $questionRepository, ViewRepository $viewRepository)
    {
        $this->question = $questionRepository;
        $this->view = $viewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $courseSlug
     * @param $yearSlug
     * @param $isExam
     * @return \Illuminate\Http\Response
     */
    public function index($courseSlug, $yearSlug, $isExam)
    {
        if ($isExam=="Exam"){$is_Exam=1;} elseif ($isExam=="Test"){$is_Exam=2;}else $is_Exam=3;
        $course     =   Course::where('slug', '=', $courseSlug)->get()->first();
        $year       =   Year::where('slug', '=', $yearSlug)->get()->first();
        $questions  =   $this->question->showQuestionsById($course->id, $year->id, $is_Exam);
        $topics = Topic::lists('name', 'id')->unique()->all();
//        $topics = Topic::with('questions')->get();
//        return $topics;
        $data       =   ['course' => $course, 'year' => $year, 'questions' => $questions,'isExam'=>$isExam,'topics'=>$topics];
        return view('general.questions.index', $data);
//        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $userSlug
     * @return \Illuminate\Http\Response
     * @internal param $courseSlug
     * @internal param $yearSlug
     * @internal param $isExam
     */
    public function user_question($userSlug)
    {
        $course     =   Course::all();
        $year       =   Year::all();
        $questions  =   $this->question->showUserQuestionsByUserId($userSlug);
        $topics = Topic::lists('name', 'id')->unique()->all();
        $data       =   ['course' => $course, 'year' => $year, 'questions' => $questions,'topics'=>$topics];
        return view('general.questions.user', $data);
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
        return view('general.questions.create', ['courses'=>$courses, 'years'=>$years, 'topics'=>$topics]);
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
            'number' => 'required|max:12',
            'body' => 'required',
        ]);
        $isSaved = $this->question->store($request);
        return redirect()->back()->with('status', 'Question '.$request->number.' uploaded successfully and will be visible immediately it is verified. ');
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Request $request, $slug)
    {
        if (Auth::user()->credit->value>0)
        {
            $question=Question::whereSlug($slug)->get()->first();
            if(isset($request->edit))
            {
                return view('general.questions.show', ['question' => $question, 'edit'=>1]);
            }
            if(isset($request->editSol))
            {
                return view('general.questions.show', ['question' => $question, 'editSol'=>1]);
            }
            else if(!isset($request->edit) || !isset($request->editSol))
            {
                $isSaved = $this->view->store($request, $question->id);
                $question = $this->question->show($slug);
                return view('general.questions.show', ['question' => $question]);
//                return response()->json(['question' => $question]);
            }
        }
        else
        return redirect('/get-coin')->with('status','Your coin has finished ');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'number' => 'required|max:12',
            'body' => 'required',
        ]);
        $isUpdate = $this->question->userUpdate($request, $slug);
//        return response()->json($isUpdate);
        return redirect()->back()->with('status', 'Question updated successfully');
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

