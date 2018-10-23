<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Auth;
use App\Level;
use App\Semester;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class DepartmentAdminDepartmentsController extends Controller
{
    public function index()
    {
            $num =1;
            $levels      = Level::where('id','!=',1)->lists('name', 'id')->all();
            $semesters = Semester::lists('name', 'id')->all();
            $department = Department::where('user_id',Auth::user()->id)->get()->first();
//        return response()->json($faculty);
            return view('departmentAdmin.department.show', ['department' => $department, 'num'=>$num, 'levels'=>$levels, 'semesters'=>$semesters]);
    }

}
