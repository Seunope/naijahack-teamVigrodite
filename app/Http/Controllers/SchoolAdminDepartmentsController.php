<?php

namespace App\Http\Controllers;

use App\Http\Repository\DepartmentRepository;
use App\Level;
use App\Semester;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class SchoolAdminDepartmentsController extends Controller
{
    private  $department;

    /**
     * SchoolAdminDepartmentsController constructor.
     */
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->department= $departmentRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $num=1;
            $data = $this->department->schoolAdminIndex();
            $faculties = $data['faculties'];
            $school = $data['school'];
            $facultiesToSelect = $data['facultiesToSelect'];
            //        if($faculties != null) return response()->json($faculties);
            //        return response()->json(['message'=>100]);
            return view('schoolAdmin.departments.index',['faculties'=>$faculties, 'school'=>$school, 'num'=>$num, 'facultiesToSelect'=>$facultiesToSelect]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $data = $this->department->schoolAdminIndex();
            $faculties = $data['faculties'];
            $school = $data['school'];
            $facultiesToSelect = $data['facultiesToSelect'];
//        return response()->json($faculties);
            return view('schoolAdmin.departments.create', ['facultiesToSelect' => $facultiesToSelect]);
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
            'name' => 'required|max:255',
            'full_name' => 'required',
        ]);
            $isSaved = $this->department->schoolAdminStore($request);
            Session::flash('status',$request->name.' added successfully ');
            return redirect('schoolAdmin/departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
            $num=1;
            $levels      = Level::where('id','!=',1)->lists('name', 'id')->all();
            $semesters = Semester::lists('name', 'id')->all();
            $department = $this->department->schoolAdminShow($slug);
//        return response()->json($faculty);
            return view('schoolAdmin.departments.show', ['department' => $department, 'num'=>$num, 'levels'=>$levels, 'semesters'=>$semesters]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
            $data = $this->department->schoolAdminEdit($slug);
            $facultiesToSelect = $data['facultiesToSelect'];
            $users = $data['users'];
            $department = $data['department'];
//        return response()->json($department);
            return view('schoolAdmin.departments.edit', ['department' => $department, 'facultiesToSelect' => $facultiesToSelect, 'users' => $users]);
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
            'name' => 'required|max:255',
            'full_name' => 'required',
        ]);
            $isUpdate = $this->department->schoolAdminUpdate($request, $slug);
//        return response()->json($isUpdate);
            Session::flash('status',$request->name.' updated successfully ');
            return redirect('schoolAdmin/departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
            $status = $this->department->schoolAdminDestroy($slug);
//            return response()->json(['message' => $status]);
            return redirect('/schoolAdmin/departments')->with('status', ' The department was deleted successfully');
    }
}
