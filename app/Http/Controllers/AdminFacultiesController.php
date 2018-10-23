<?php

namespace App\Http\Controllers;

use App\Http\Repository\FacultyRepository;
use App\School;
use Illuminate\Http\Request;
use App\Faculty;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Session;

class AdminFacultiesController extends Controller
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
            $faculties = $this->faculty->index();
            $schools = School::lists('name', 'id')->all();
    //        if($faculties != null) return response()->json($faculties);
    //        return response()->json(['message'=>100]);
            return view('admin.faculties.index',['faculties'=>$faculties, 'num'=>$num, 'schools'=>$schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $schools = School::lists('name', 'id')->all();
    //        return response()->json($schools);
            return view('admin.faculties.create', ['schools'=>$schools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $isSaved=$this->faculty->store($request);
            Session::flash('status','Faculty Added Successfully');
            return redirect('admin/faculties');
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
            $faculty=$this->faculty->show($slug);
    //        return response()->json($faculty);
            Session::flash('status','Faculty Added Successfully');
            return view('admin.faculties.show',['faculty'=>$faculty,'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
            $faculty = $this->faculty->edit($slug);
    //        return response()->json($faculty);
            return view('admin.faculties.edit', ['faculty'=>$faculty]);
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
            $isUpdate=$this->faculty->update( $request, $slug);
//            return response()->json($isUpdate);
            Session::flash('status','Faculty Updated Successfully');
            return redirect('admin/faculties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
            $status = $this->faculty->destroy($slug);
//            return response()->json(['message'=>$status]);
            return redirect('/admin/faculties')->with('status', 'Faculty deleted successfully');
    }
}
