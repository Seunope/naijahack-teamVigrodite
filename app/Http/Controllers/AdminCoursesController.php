<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\Http\Repository\CourseFacade;
use App\Http\Repository\CourseRepository;
use App\Level;
use App\School;
use App\Year;
use App\User;
use App\Semester;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class AdminCoursesController extends Controller
{
    /**
     * AdminCoursesController constructor.
     */
    private $course;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->course = $courseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $num=1;
            $courses = $this->course->index();
            $schools = School::all();
            $departments = Department::lists('name', 'id')->all();
            $levels      = Level::lists('name', 'id')->all();
            $semesters = Semester::lists('name', 'id')->all();
    //        if($courses != null) return response()->json($courses);
    //        return response()->json(['message'=>100]);
            return view('admin.courses.index',['courses'=>$courses, 'num'=>$num,'schools'=>$schools,'departments'=>$departments, 'levels'=>$levels, 'semesters'=>$semesters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $departments = Department::lists('name', 'id')->all();
            $levels      = Level::lists('name', 'id')->all();
            $semesters = Semester::lists('name', 'id')->all();
    //        return response()->json($departments);
            return view('admin.courses.create', ['departments'=>$departments, 'levels'=>$levels, 'semesters'=>$semesters]);
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
            'code' => 'required|max:255',
            'title' => 'required',
            'unit' => 'numeric|digits_between:0,1',
        ]);
            $isSaved = $this->course->store($request);
            return redirect('admin/courses')->with('status', $request->code.' updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
            $course=$this->course->show($slug);
            $years=Year::all();
    //        return response()->json($course);
            return view('admin.courses.show',['course'=>$course, 'years'=>$years]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
            $course = $this->course->edit($slug);
            $department=$course->department;
//            $users = User::where('school_id',$department->faculty->school->id)->get('name');
            $users=User::select('name','id','department_id')->where('school_id',$department->faculty->school->id)->get();
//            $users=User::where('school_id',$department->faculty->school->id)->lists('name', 'id')->put(0, 'none')->all();
//        return $users;
            $levels = Level::lists('name', 'id')->all();
            $semesters = Semester::lists('name', 'id')->all();
            //        return response()->json($departments,$levels, $semesters);
            return view('admin.courses.edit', ['course' => $course, 'semesters' => $semesters, 'users'=>$users]);
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
            'code' => 'required|max:255',
            'title' => 'required',
            'unit' => 'numeric|digits_between:0,1',
        ]);
            $isUpdate=$this->course->update( $request, $slug);
    //        return response()->json($isUpdate);
            return redirect('admin/courses')->with('status', $request->code.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
            $status = $this->course->destroy($slug);
    //        return response()->json(['message'=>$status]);
            return redirect('/admin/courses')->with('status', 'Course deleted successfully');
    }
}
