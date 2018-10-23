<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Repository\LevelAdminRepository;
use App\HundredAdmin;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class LevelAdminController extends Controller
{
    private  $levelAdmin;
    /**
     * LevelAdminController constructor.
     */
    public function __construct(LevelAdminRepository $levelAdminRepository)
    {
        $this->levelAdmin = $levelAdminRepository;
    }

    /**
     * Store a newly created 100L Admin in storage.
     * @return \Illuminate\Http\Response
     */
    public function hundred_store(Request $request)
    {
        $this->validate($request, ['user_id' => 'required']);
        $isSaved=$this->levelAdmin->hundred_store($request);
        return redirect()->back()->with('status', ' Changes saved');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function hundred_edit($slug)
    {
        $hundredAdmin=HundredAdmin::where('slug',$slug)->get()->first();
        $department = $hundredAdmin->department;
        $users = $department->users;
        return view('management.levelAdmin.changeLevelAdmin',['users'=>$users, 'department'=>$department, 'hundredAdminSlug'=>$slug]);
    }

    /**
     * Update the specified  in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, ['user_id' => 'required']);
        $isUpdate = $this->levelAdmin->hundred_update($request, $slug);
        return redirect('admin/departments')->with('status', $request->name.' updated successfully');
    }
}
