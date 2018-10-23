<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\CourseRepository;
use App\Year;
use App\Course;
use Illuminate\Support\Facades\Session;
use App\Department;
use App\Http\Requests;

class CourseAdminCoursesController extends Controller
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
            $courses = $this->course->courseAdminIndex();
            //        if($courses != null) return response()->json($courses);
            //        return response()->json(['message'=>100]);
            return view('courseAdmin.courses.index',['courses'=>$courses, 'num'=>$num]);
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
            $isSaved = $this->course->courseAdminStore($request);
            Session::flash('status',$request->code.' added successfully ');
            return redirect('courseAdmin/courses')->with('status', 'Course saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
            $course = Course::whereSlug($slug)->get()->first();
            $years=Year::all();
            //        return response()->json($course);
            return view('courseAdmin.courses.show',['course'=>$course, 'years'=>$years]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
            $course = $this->course->courseAdminEdit($slug);
            return view('courseAdmin.courses.edit', ['course' => $course]);
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
            $isUpdate=$this->course->courseAdminUpdate( $request, $slug);
            //        return response()->json($isUpdate);
            Session::flash('status',$request->code.' Updated successfully ');
            return redirect('courseAdmin/courses')->with('status', 'The course was updated successfully');
    }

}
