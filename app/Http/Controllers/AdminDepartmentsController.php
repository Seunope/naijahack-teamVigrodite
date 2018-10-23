<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Repository\DepartmentRepository;
use App\School;
use App\User;
use App\Level;
use App\Semester;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class AdminDepartmentsController extends Controller
{
    /**
     * AdminDepartmentsController constructor.
     */
    private $department;
    public function __construct( DepartmentRepository $departmentRepository)
    {
        $this->department = $departmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = 1;
        $departments = $this->department->index();
        $faculties = Faculty::lists('name', 'id')->all();
        $schools=School::all();
//        if($departments != null) return response()->json($departments);
//        return response()->json(['message'=>100]);
        return view('admin.departments.index', ['departments' => $departments, 'num' => $num, 'faculties' => $faculties,'schools'=>$schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::lists('name', 'id')->all();
//        return response()->json($faculties);
        return view('admin.departments.create', ['faculties' => $faculties]);
    }

    /**
     * Store a newly created department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $isSaved = $this->department->store($request);
        return redirect('admin/departments')->with('status', $request->name.' saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $levels      = Level::lists('name', 'id')->all();
        $semesters = Semester::lists('name', 'id')->all();
        $department = $this->department->show($slug);
//        return response()->json($faculty);
        return view('admin.departments.show', ['department' => $department,'num'=>1,'semesters'=>$semesters, 'levels'=>$levels]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $department = $this->department->edit($slug);
        $users = User::where('department_id', '=', $department->id)->lists('name', 'id')->put(0, 'none')->all();
//        return response()->json($department);
        return view('admin.departments.edit', ['department' => $department, 'users' => $users]);
    }

    /**
     * Update the specified department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $isUpdate = $this->department->update($request, $slug);
//          return response()->json($isUpdate);
        return redirect('admin/departments')->with('status', $request->name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $status = $this->department->destroy($slug);
//            return response()->json(['message' => $status]);
        return redirect('/admin/departments')->with('status', 'Department deleted successfully');
    }




























    /**
     * Store a newly created department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hundredStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $isSaved = $this->department->store($request);
        return redirect('admin/departments')->with('status', $request->name.' saved successfully');
    }

    /**
     * Update the specified department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hundredUpdate(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $isUpdate = $this->department->update($request, $slug);
//          return response()->json($isUpdate);
        return redirect('admin/departments')->with('status', $request->name.' updated successfully');
    }



}
