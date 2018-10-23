<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/1/2016
 * Time: 4:09 PM
 */

namespace App\Http\Repository;
use App\Faculty;
use App\School;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
class FacultyRepository implements FacultyFacade
{
    /**
     * Gets all faculty from the database
     * @return mixed
     */
    public function index()
    {
        return Faculty::all();
    }

    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Faculty::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single faculty from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $faculty                 =   new Faculty;
        $faculty->name           =   $request->name;
        $faculty->full_name      =   $request->full_name;
        $faculty->school_id      =   $request->school_id;
        $faculty->slug           =   uniqid();
        $isSaved                 =   $faculty->save();
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return Faculty::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $faculty                 =   Faculty::whereSlug($slug)->get()->first();
        $faculty->name           =   $request->name;
        $faculty->full_name      =   $request->full_name;
        $isUpdated              =   $faculty->update();
        return $isUpdated;
    }

    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Faculty::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Faculty found and deleted successfully";
            }
            else {
                $status            =   "Faculty is not deleted but found";
            }
        }
        else{
            $status                =    "Faculty not found";
        }
        return $status;
    }














    /**
     * Gets all faculty from the database
     * @return mixed
     */
    public function schoolAdminIndex()
    {
        $school=School::where('user_id','=',Auth::user()->id)->get()->first();
        return Faculty::where('school_id','=',$school->id)->paginate(10);
    }

    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function schoolAdminShow($slug)
    {
        return Faculty::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single faculty from the database
     * @return boolean
     */
    public function schoolAdminStore(Request $request)
    {
        $faculty                 =   new Faculty;
        $faculty->name           =   $request->name;
        $faculty->full_name      =   $request->full_name;
        $faculty->school_id      =   $request->school_id;
        $faculty->slug           =   uniqid();
        $isSaved                 =   $faculty->save();
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function schoolAdminEdit($slug)
    {
        $faculty= Faculty::whereSlug($slug)->get()->first();
        $school=School::where('user_id','=',Auth::user()->id)->get()->first();
        return $data=[
            'faculty'=>$faculty,
            'school'=>$school
        ];
    }
    /**
     * @param $slug
     * @return bool
     */
    public function schoolAdminUpdate(Request $request, $slug)
    {
        $faculty                 =   Faculty::whereSlug($slug)->get()->first();
        $faculty->name           =   $request->name;
        $faculty->full_name      =   $request->full_name;
//        $faculty->school_id      =   $request->school_id;
        $isUpdated              =   $faculty->update();
        return $isUpdated;
    }

    /**
     *
     */
    public function schoolAdminDestroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Faculty::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Faculty found and deleted successfully";
            }
            else {
                $status            =   "Faculty is not deleted but found";
            }
        }
        else{
            $status                =    "Faculty not found";
        }
        return $status;
    }
}