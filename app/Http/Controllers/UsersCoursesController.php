<?php

namespace App\Http\Controllers;

use App\Http\Repository\CourseRepository;
use App\Year;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersCoursesController extends Controller
{
    private $course;

    /**
     * UsersCoursesController constructor.
     */
    public function __construct(CourseRepository $courseRepository)
    {
        $this->course   =   $courseRepository;
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
        return view('general/courses/home', ['courses' => $courses,'years'=>$years]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course = $this->course->showOneCourse($slug);
        $years = $this->course->showYearByCourse($course->id);
        return view('general/courses/course', ['course' => $course, 'years' => $years]);
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
