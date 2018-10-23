<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use App\Http\Repository\SchoolRepository;
use App\Level;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;


class UsersSchoolsController extends Controller
{
    /**
     * UsersSchoolsController constructor.
     */
    private  $schools;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schools   =   $schoolRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools    =   $this->schools->index();
        return  view('general/schools/index', ['schools'=>$schools]);
    }

    /**
     * Returns list of levels to the registration page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dont touch
        $levels =  Level::all('id', 'name');
        return response()->json($levels);
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
        $school =   $this->schools->show($slug);
        return  view('general/schools/show',['school'=>$school]);
    }

    /**
     * Return the list of all departments to the registration page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all('id', 'name', 'faculty_id');
        return response()->json($departments);
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

    }
}
