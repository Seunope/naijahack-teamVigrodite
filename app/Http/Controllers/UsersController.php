<?php

namespace App\Http\Controllers;
use App\Course;
use App\Department;
use App\Faculty;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\QuestionRepository;
use App\Http\Repository\UserBrowserRepository;
use App\Level;
use App\Http\Repository\ViewRepository;
use App\Phone;
use App\Testimony;
use App\User;
use App\Year;
use Auth;
use App\Question;
use App\School;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
class UsersController extends Controller
{
    private $course;
    private $userBrowser;

    /**
     * UsersController constructor.
     * @param CourseRepository $courseRepository
     * @param UserBrowserRepository $userBrowserRepository
     */
    public function __construct(CourseRepository $courseRepository,  UserBrowserRepository $userBrowserRepository)
    {
        $this->course = $courseRepository;
        $this->userBrowser =$userBrowserRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users          =   User::all()->random(5);
        $schools        =   School::all();
        if (Auth::check() && isset(Auth::user()->level)){
            $courses = $this->course->showCourseById(Auth::user()->level->slug);
            return view('user.index',['users'=>$users, 'courses'=>$courses, 'schools'=>$schools]);
        }
        else
            return view('user.index',['users'=>$users, 'schools'=>$schools]);
//        $userBrowser= $this->userBrowser->UserBrowser();
//        $useragent = $_SERVER['HTTP_USER_AGENT'];
//            $data=[
//            'title'=>'Someone just access sol.ng',
//            'content'=>'A user just access sol.ng from a '.$userBrowser.' browser on a '.php_uname().$_SERVER['REMOTE_ADDR'].getenv('HTTP_CLIENT_IP'),
//        ];
//        Mail::send('email.text',$data,function ($message){
////            $message->to('log@sol.ng', 'Unknown user')->subject('New user entry');
//        }
//        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        $courses=Course::where('school_id',Auth::user()->school_id)->orderBy('department_id', 'desc')->paginate(10);
        return view('user.courses',['courses'=> $courses, 'num'=>1]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faculties()
    {
        $faculties=Faculty::where('school_id',Auth::user()->school_id)->get()->all();
        return view('user.faculties',['faculties'=> $faculties, 'num'=>1]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advancedSearch()
    {
        return view('user.advance-search');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
//        return view('user.faq');
        return "FAQ comming soon";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_coin()
    {
        return view('user.get-coin');
    }

    /**
     * Return error 404 page Page not found
     *
     * @return \Illuminate\Http\Response
     */
    public function notFound()
    {
        return view('errors.404');
    }

    /**
     * Return error UnAuthorized page Page not found
     *
     * @return \Illuminate\Http\Response
     */
    public function notAuthorized()
    {
        return view('errors.403');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function goToHome()
    {
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('user.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete_profile()
    {
        if (isset(Auth::user()->level)){
            return redirect()->back();
        }
        $faculties = Auth::user()->school->faculties;
        $levels = Level::lists('name', 'id')->all();
        return view('user.complete-profile', ['faculties' => $faculties, 'levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_profile()
    {
        $faculties = Auth::user()->school->faculties;
        $number = Auth::user()->phone? Auth::user()->phone->number : "0";
        $levels = Level::lists('name', 'id')->all();
        return view('user.edit-profile', ['faculties' => $faculties,'number' => $number, 'levels' => $levels]);
//            return view('user.edit-profile', ['faculties' => $faculties, 'levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function home($slug)
    {
        $years=Year::all();
        $courses = $this->course->showCourseById($slug);
//      return response()->json($courses);
        return view('user.home', ['courses' => $courses,'years'=>$years]);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function course($slug)
    {
        $course = $this->course->showOneCourse($slug);
        $years = $this->course->showYearByCourse($course->id);
        return view('user.course', ['course' => $course, 'years' => $years]);
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function profile()
    {
        return view('user.profile');
    }

    /**
     * Display the specified resource.
     *
     * @param $name
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function user_profile($name, $slug)
    {
        $user=User::where('slug',$slug)->get()->first();
        if (isset($user)){
            return view('user.user-profile-page',['user'=>$user]);
        }
        else abort(404);
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function inbox()
    {
        return view('user.inbox');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function postInbox()
    {
        return view('user.inbox');
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function about()
    {
        $AllCourses = Course::count();
        $AllUsers = User::count();
        $AllDepartments = Department::count();
        $AllQuestions = Question::count();
        $AllSchools = School::count();
        $AllSolvedQuestions = Question::where('status', '=', 1)->get()->count();
        if (count(Testimony::all()) > 3) {
            $testimonies = Testimony::all()->random(3);
        } else {
            $testimonies = ['body'=>"Go to Share Your Testimony link below to add your Testimony"];
        }
        return view('user.about',['num'=>1,'AllCourses'=>$AllCourses, 'AllUsers'=>$AllUsers, 'AllDepartments'=>$AllDepartments, 'AllQuestions'=>$AllQuestions, 'AllSolvedQuestions'=>$AllSolvedQuestions, 'AllSchools'=>$AllSchools,'testimonies'=>$testimonies]);
    }
}
