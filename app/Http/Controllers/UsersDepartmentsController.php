<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Repository\DepartmentRepository;
use App\Level;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersDepartmentsController extends Controller
{

    private $departments;

    /**
     * UsersDepartmentsController constructor.
     * @param $departments
     */
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departments = $departmentRepository;
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
        $levels     =   Level::where('id','!=',1)->get();
        $department =   $this->departments->show($slug);
        $data       =   ['department'=>$department,'levels'=>$levels];
        return view('general/departments/show', $data);
    }

    /**
     * returns list of faculties in school with id = id ,used in registration page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dont touch
        $faculties =  Faculty::select('id')->where('school_id', '=', $id)->get();
        return response()->json($faculties);
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
