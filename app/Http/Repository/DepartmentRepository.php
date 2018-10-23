<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/2/2016
 * Time: 10:06 AM
 */

namespace App\Http\Repository;
use App\Department;
use App\Faculty;
use App\School;
use App\User;
use App\Course;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
class DepartmentRepository implements DepartmentFacade
{
    /**
     * Gets all faculty from the database
     * @return mixed
     */
    public function index()
    {
        return Department::all();
    }

    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Department::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single department from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $department                 =   new Department;
        $department->name           =   $request->name;
        $department->full_name      =   $request->full_name;
        $department->faculty_id      =   $request->faculty_id;
        $department->slug           =   uniqid();
        $isSaved                 =   $department->save();
//        $data=[
//            'title'=>'New department added'.$department->name,
//            'content'=>'New Department has been added to sol.ng, Department name: '.$department->full_name.' Under Faculty: '.$department->faculty->full_name.' Of: '.$department->faculty->school->full_name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('New Department added');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('New Department added');
//        }
//        );
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return Department::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $department    =   Department::whereSlug($slug)->get()->first();
        if(isset($department->user)) {
            if($department->user->role_id>2) {
                $isDepartmentAdmin=Department::where('user_id',$department->user_id)->get()->all();
                $countDepartment=count($isDepartmentAdmin);
                if($countDepartment<1){
                    User::where('id',$department->user_id)->update(['role_id'=>3]);
                }
                else
                {
                    $isCourseAdmin=Course::where('user_id',$department->user_id)->get()->all();
                    $countCourse=count($isCourseAdmin);
                    if($countCourse>0){
                        User::where('id',$department->user_id)->update(['role_id'=>4]);
                    }
                    else
                        User::where('id',$department->user_id)->update(['role_id'=>5]);
                }
            }
        }
        $department->name           =   $request->name;
        $department->full_name      =   $request->full_name;
        $department->user_id      =   $request->user_id;
        $user=User::where('id',$request->user_id)->get()->first();
        if (isset($user)){
            if ($user->role_id>3) {
                User::where('id',$request->user_id)->update(['role_id'=>3]);
            }
        }
        $isUpdated              =   $department->update();
        return $isUpdated;
    }

    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Department::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Department found and deleted successfully";
            }
            else {
                $status            =   "Department is not deleted but found";
            }
        }
        else{
            $status                =    "Department not found";
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
        $faculties= Faculty::where('school_id','=',$school->id)->paginate(3);
        $facultiesToSelect = Faculty::where('school_id','=',$school->id)->lists('name', 'id')->put(0, 'none')->all();
        return $data=[
        'faculties'=>$faculties,
        'facultiesToSelect'=>$facultiesToSelect,
        'school'=>$school
        ];
    }

    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function schoolAdminShow($slug)
    {
        return Department::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single faculty from the database
     * @return boolean
     */
    public function schoolAdminStore(Request $request)
    {
        $department                 =   new Department;
        $department->name           =   $request->name;
        $department->full_name      =   $request->full_name;
        $department->faculty_id      =   $request->faculty_id;
        $department->slug           =   uniqid();
        $isSaved                 =   $department->save();
//        $data=[
//            'title'=>'New department added'.$department->name,
//            'content'=>'New Department has been added to sol.ng, Department name: '.$department->full_name.' Under Faculty: '.$department->faculty->full_name.' Of: '.$department->faculty->school->full_name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('New Department added');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('New Department added');
//        }
//        );
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function schoolAdminEdit($slug)
    {
        $school=School::where('user_id','=',Auth::user()->id)->get()->first();
        $facultiesToSelect = Faculty::where('school_id','=',$school->id)->lists('name', 'id')->put(0, 'none')->all();
        $department = Department::whereSlug($slug)->get()->first();
        $users = User::where('department_id','=',$department->id)->lists('name', 'id')->put(0, 'none')->all();
        return $data=[
        'department'=>$department,
        'facultiesToSelect'=>$facultiesToSelect,
        'users'=>$users
        ];
    }
    /**
     * @param $slug
     * @return bool
     */
    public function schoolAdminUpdate(Request $request, $slug)
    {
        $department    =   Department::whereSlug($slug)->get()->first();
        if(isset($department->user)) {
            if($department->user->role_id>2) {
                $isDepartmentAdmin=Department::where('user_id',$department->user_id)->get()->all();
                $countDepartment=count($isDepartmentAdmin);
                if($countDepartment<1){
                    User::where('id',$department->user_id)->update(['role_id'=>3]);
                }
                else
                {
                    $isCourseAdmin=Course::where('user_id',$department->user_id)->get()->all();
                    $countCourse=count($isCourseAdmin);
                    if($countCourse>0){
                        User::where('id',$department->user_id)->update(['role_id'=>4]);
                    }
                    else
                        User::where('id',$department->user_id)->update(['role_id'=>5]);
                }
            }
        }
        $department->name           =   $request->name;
        $department->full_name      =   $request->full_name;
        $department->user_id      =   $request->user_id;
        $user=User::where('id',$request->user_id)->get()->first();
        if (isset($user)){
            if ($user->role_id>3) {
                User::where('id',$request->user_id)->update(['role_id'=>3]);
            }
        }
        $isUpdated              =   $department->update();
        return $isUpdated;
    }

    /**
     *
     */
    public function schoolAdminDestroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Department::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Department found and deleted successfully";
            }
            else {
                $status            =   "Department is not deleted but found";
            }
        }
        else{
            $status                =    "Department not found";
        }
        return $status;
    }
}