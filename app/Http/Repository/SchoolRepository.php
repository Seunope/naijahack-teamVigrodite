<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 8/31/2016
 * Time: 10:49 PM
 */
namespace App\Http\Repository;
use App\School;
use App\User;
use App\Department;
use App\Course;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
class SchoolRepository implements SchoolFacade
{
    /**
     * Gets all school from the database
     * @return mixed
     */
    public function index()
    {
        return School::all();
    }

    /**
     * Gets a single school from the database
     * @return mixed
     */
    public function show($slug)
    {
        return School::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single school from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $school                 =   new School;
        $school->name           =   $request->name;
        $school->full_name      =   $request->full_name;
        $school->slug           =   uniqid();
        $isSaved                =   $school->save();
//        $data=[
//            'title'=>'New school added'.$school->name,
//            'content'=>'New School has been added to sol.ng, School name: '.$school->full_name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('New School added');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('New School entry');
//        }
//        );
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return School::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $school                 =   School::whereSlug($slug)->get()->first();
        if(isset($school->user)) {
            if($school->user->role_id>1) {
                $isDepartmentAdmin=Department::where('user_id',$school->user_id)->get()->all();
                $countDepartment=count($isDepartmentAdmin);
                if($countDepartment>0){
                    User::where('id',$school->user_id)->update(['role_id'=>3]);
                }
                else
                {
                    $isCourseAdmin=Course::where('user_id',$school->user_id)->get()->all();
                    $countCourse=count($isCourseAdmin);
                    if($countCourse>0){
                        User::where('id',$school->user_id)->update(['role_id'=>4]);
                    }
                    else
                        User::where('id',$school->user_id)->update(['role_id'=>5]);
                }
            }
        }
        $school->name           =   $request->name;
        $school->full_name      =   $request->full_name;
        $school->user_id        =   $request->user_id;
        $isUpdated              =   $school->update();
        $user=User::where('id',$request->user_id)->get()->first();
        if (isset($user)){
            if ($user->role_id>2) {
                User::where('id',$request->user_id)->update(['role_id'=>2]);
            }
        }
//        $data=[
//            'title'=>$school->name.' school updated',
//            'content'=>$school->name.' has been updated to sol.ng, Co- ordinator: '.$school->user->name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('New School added');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('New School entry');
//        }
//        );
        return $isUpdated;
    }

    /**
     *
     */
    public function destroy($slug)
    {
//        $isDeleted = [
//            'message' => "School not found",
//            'return' => false
//        ];
//
//        $deleteModel = School::find($slug);
//        if ($deleteModel != null) {
//            $isDeletedA = $deleteModel->delete();
//            if ($isDeletedA) {
//                $isDeleted['message'] = "School is deleted";
//                $isDeleted['return'] = true;
//            } else {
//                $isDeleted['message'] = "School is not deleted but found";
//                $isDeleted['return'] = false;
//            }
//        }
//        return $isDeleted;
//
//

        $status                   =   "";
        $isFind                     =   false;
        $isFind = School::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "School found and deleted successfully";
            }
            else {
                $status            =   "School is not deleted but found";
            }
        }
        else{
            $status                =    "School not found";
        }
        return $status;
    }
}