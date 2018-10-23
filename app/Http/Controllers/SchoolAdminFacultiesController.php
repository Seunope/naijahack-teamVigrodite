<?php

namespace App\Http\Controllers;

use App\Http\Repository\FacultyRepository;
use App\School;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Session;

class SchoolAdminFacultiesController extends Controller
{
    /**
     * AdminFacultiesController constructor.
     */
    private $faculty;


    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->faculty = $facultyRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $num=1;
            $isActive=2;
            $faculties = $this->faculty->schoolAdminIndex();
            $school = School::where('user_id',Auth::user()->id)->get()->first();
            $school_id = $school['id'];
            //        if($faculties != null) return response()->json($faculties);
            //        return response()->json(['message'=>100]);
            return view('schoolAdmin.faculties.index',['school'=>$school,'isActive'=>$isActive,'faculties'=>$faculties, 'num'=>$num, 'school_id'=>$school_id]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $school = School::where('user_id',Auth::user()->id)->get()->first();
            $school_id=$school->id;
            //        return response()->json($schools);
            return view('schoolAdmin.faculties.create', ['school_id'=>$school_id]);
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
        $isSaved=$this->faculty->schoolAdminStore($request);
        Session::flash('status',$request->name.' Faculty Added Successfully');
        return redirect('/schoolAdmin/faculties');
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
            $faculty=$this->faculty->schoolAdminShow($slug);
            //        return response()->json($faculty);
            return view('schoolAdmin.faculties.show',['faculty'=>$faculty,'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
            $data = $this->faculty->schoolAdminEdit($slug);
            $faculty = $data['faculty'];
            //        return response()->json($faculty);
            return view('schoolAdmin.faculties.edit', ['faculty'=>$faculty]);
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
            $isUpdate=$this->faculty->schoolAdminUpdate( $request, $slug);
            Session::flash('status',$request->full_name.' edited Successfully');
//            return response()->json($isUpdate);
            return redirect('schoolAdmin/faculties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
            $status = $this->faculty->schoolAdminDestroy($slug);
//            return response()->json(['message'=>$status]);
            return redirect('/schoolAdmin/faculties')->with('status', 'The faculty was deleted successfully');
    }
}
