<?php

namespace App\Http\Controllers;

use App\Http\Repository\SchoolRepository;
use App\Http\Requests\AdminSchoolRequest;
use App\School;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminSchoolsController extends Controller
{
    /**
     * AdminSchoolsController constructor.
     */
    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->school = $schoolRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $num = 1;
            $schools = $this->school->index();
            return view('admin.schools.index', ['num' => $num, 'schools' => $schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $isSaved = $this->school->store($request);
//      return response()->json(['message'=>$isSaved]);
            return redirect('/admin/schools')->with('status', 'School Added successfully');
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
            $school = $this->school->show($slug);
//        return response()->json($school);
            return view('admin.schools.show', ['school' => $school,'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
            $school = $this->school->edit($slug);
//        return response()->json($school);
            $users = User::where('school_id','=',$school->id)->lists('name', 'id')->put(0, 'none')->all();
            return view('admin.schools.edit', ['school'=>$school,'users'=>$users]);
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
            $isUpdate = $this->school->update($request, $slug);
//            return response()->json($isUpdate);
            return redirect('/admin/schools')->with('status', 'School updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
//        School::where('slug', $slug)->delete();
            $status = $this->school->destroy($slug);
//            return response()->json(['message' => $status]);
        return redirect('/admin/schools')->with('status', 'School deleted successfully');
    }
}
