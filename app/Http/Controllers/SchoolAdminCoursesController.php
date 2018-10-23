<?php

namespace App\Http\Controllers;

use App\Http\Repository\CourseRepository;
use Illuminate\Http\Request;
use App\Level;
use App\Year;
use App\User;
use App\Semester;
use Illuminate\Support\Facades\Session;
use App\Department;
use App\Http\Requests;
use Auth;

class SchoolAdminCoursesController extends Controller
{
    /**
     * AdminCoursesController constructor.
     */
    private $course;

    /**
     * SchoolAdminCoursesController constructor.
     */
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
        $faculties = $this->course->schoolAdminIndex();
        $levels      = Level::where('id','!=',1)->lists('name', 'id')->all();
        $semesters = Semester::lists('name', 'id')->all();
        //        if($courses != null) return response()->json($courses);
        //        return response()->json(['message'=>100]);
//        return $faculties;
        return view('schoolAdmin.courses.index',['faculties'=>$faculties, 'num'=>$num, 'levels'=>$levels, 'semesters'=>$semesters]);
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
        return view('schoolAdmin.courses.create', ['departments'=>$departments, 'levels'=>$levels, 'semesters'=>$semesters]);
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
        Session::flash('status',$request->code.' added successfully ');
        return redirect('schoolAdmin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course=$this->course->schoolAdminShow($slug);
        $years=Year::all();
        //        return response()->json($course);
        return view('schoolAdmin.courses.show',['course'=>$course, 'years'=>$years]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $course = $this->course->schoolAdminEdit($slug);
        $users=User::where('department_id',$course->department->id)->lists('name', 'id')->put(0, 'none')->all();
        //        return response()->json($departments,$levels, $semesters);
        return view('schoolAdmin.courses.edit', ['course' => $course,'users'=>$users]);
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
        $isUpdate=$this->course->schoolAdminUpdate( $request, $slug);
        //        return response()->json($isUpdate);
        Session::flash('status',$request->code.' Updated successfully ');
        return redirect('schoolAdmin/courses');
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
        return redirect('/schoolAdmin/courses')->with('status', 'The course was deleted successfully');
    }
}
