<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/2/2016
 * Time: 4:05 PM
 */
namespace App\Http\Repository;
use App\Department;
use App\Faculty;
use App\Level;
use App\Question;
use App\School;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Course;
use Illuminate\Support\Facades\Mail;

class CourseRepository implements CourseFacade
{
    /**
     * Gets all courses from the database
     * @return mixed
     */
    public function index()
    {
        return Course::all();
    }

    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single course from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $course                     =   new Course();
        $course->code               =   $request->code;
        $course->title              =   $request->title;
        $course->unit               =   $request->unit;
        $course->type               =   $request->type;
        $course->department_id      =   $request->department_id;
        $department= Department::where('id',$request->department_id)->get()->first();
        $course->school_id          =   $department->faculty->school->id;
        $course->semester_id        =   $request->semester_id;
        $course->level_id           =   $request->level_id;
        $course->slug               =   uniqid();
        $isSaved                    =   $course->save();
//        $data=[
//            'title'=>'New course entry'.$course->code,
//            'content'=>'New course has been added to sol.ng, course code: '.$course->code .'dept: '.$course->department->name.' school: '.$course->school->name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('New course entry');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('New course entry');
//        }
//        );
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $course                 =   Course::whereSlug($slug)->get()->first();
        if(isset($course->user)) {
            if ($course->user_id>0 && $course->user->role_id>3) {
                $isAdmin=Course::where('user_id',$course->user_id)->get()->all();
                $count=count($isAdmin);
                if($count==1){
                    User::where('id',$course->user_id)->update(['role_id'=>5]);
                }
            }
        }
        $course->code               =   $request->code;
        $course->title              =   $request->title;
        $course->unit               =   $request->unit;
        $course->user_id           =   $request->user_id;
        $user=User::where('id',$request->user_id)->get()->first();
        if (isset($user)){
            if ($user->role_id>4) {
                User::where('id',$request->user_id)->update(['role_id'=>4]);
            }
        }
        $isUpdated                  =   $course->update();
//        $data=[
//            'title'=>'Course edit: '.$course->code,
//            'content'=>'A course  has been updated in sol.ng, course code: '.$course->code .'dept: '.$course->department->name.' school: '.$course->school->name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('Course edit');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('Course edit');
//        }
//        );
        return $isUpdated;
    }

    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Course::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Course found and deleted successfully";
            }
            else {
                $status            =   "Course is not deleted but found";
            }
        }
        else{
            $status                =    "Course not found";
        }
        return $status;
    }





//    USER INTERFACE


    /**
     * Gets all course by by faculty from the database
     * @return mixed
     */
    public function showCourseById($slug)
    {
        $level=Level::where('slug',$slug)->get()->first();
        return Course::where('level_id','=',$level->id)->where('department_id', Auth::user()->department_id)->get()->all();
    }

    /**
     * Gets a single course from the database
     * @return mixed
     */
    public function showOneCourse($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }
    /**
     * Gets a single course from the database
     * @return mixed
     */
    public function showYearByCourse($id)
    {
//        return Course::where('slug','=',$slug)->get()->first();
//        return Solution::where('question_id', $id)->get()->first();
        return Question::where('course_id','=',$id)
            ->groupBy('year_id')
            ->get()
            ->all();
    }




    /**
     * Gets all course from the database realting to this school
     * @return mixed
     */
    public function schoolAdminIndex()
    {
        $school=School::where('user_id',Auth::user()->id)->get()->first();
        return Faculty::where('school_id',$school->id)->paginate(2);
    }

    /**
     * Gets a single course from the database
     * @return mixed
     */
    public function schoolAdminShow($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }
    /**
     * @return mixed
     */
    public function schoolAdminEdit($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function schoolAdminUpdate(Request $request, $slug)
    {
        $course                 =   Course::whereSlug($slug)->get()->first();
        if(isset($course->user)) {
            if ($course->user->role_id>3) {
                $isAdmin=Course::where('user_id',$course->user_id)->get()->all();
                $count=count($isAdmin);
                if($count==1){
                    User::where('id',$course->user_id)->update(['role_id'=>5]);
                }
            }
        }
        $course->code               =   $request->code;
        $course->title              =   $request->title;
        $course->unit               =   $request->unit;
        $course->user_id           =   $request->user_id;
        $user=User::where('id',$request->user_id)->get()->first();
        if (isset($user)){
            if ($user->role_id>4) {
                User::where('id',$request->user_id)->update(['role_id'=>4]);
            }
        }
        $isUpdated                  =   $course->update();
//        $data=[
//            'title'=>'Course edit: '.$course->code,
//            'content'=>'A course  has been updated in sol.ng, course code: '.$course->code .'dept: '.$course->department->name.' school: '.$course->school->name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('Course edit');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('Course edit');
//        }
//        );
        return $isUpdated;
    }



    /**
     * Gets all courses under this department from the database
     * @return mixed
     */
    public function departmentAdminIndex()
    {
        $department = Department::where('user_id',Auth::user()->id)->get()->first();
        return Course::where('department_id', $department->id)->get()->all();
    }

    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function departmentAdminShow($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }

    /**
     * @return mixed
     */
    public function departmentAdminEdit($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function departmentAdminUpdate(Request $request, $slug)
    {
        $course                 =   Course::whereSlug($slug)->get()->first();
        if(isset($course->user)) {
            if ($course->user->role_id>3) {
                $isAdmin=Course::where('user_id',$course->user_id)->get()->all();
                $count=count($isAdmin);
                if($count==1){
                    User::where('id',$course->user_id)->update(['role_id'=>5]);
                }
            }
        }
        $course->code               =   $request->code;
        $course->title              =   $request->title;
        $course->unit               =   $request->unit;
        $course->user_id           =   $request->user_id;
        $user=User::where('id',$request->user_id)->get()->first();
        if (isset($user)){
            if ($user->role_id>4) {
                User::where('id',$request->user_id)->update(['role_id'=>4]);
            }
        }
        $isUpdated                  =   $course->update();
//        $data=[
//            'title'=>'Course edit: '.$course->code,
//            'content'=>'A course  has been updated in sol.ng, course code: '.$course->code .'dept: '.$course->department->name.' school: '.$course->school->name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('Course edit');
//            $message->to('hammed@sol.ng', Auth::user()->name)->subject('Course edit');
//        }
//        );
        return $isUpdated;
    }




    /**
     * Gets all faculty from the database
     * @return mixed
     */
    public function courseAdminIndex()
    {
        return Course::where('user_id', Auth::user()->id)->get()->all();
    }
    /**
     * @return mixed
     */
    public function courseAdminEdit($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function courseAdminUpdate(Request $request, $slug)
    {
        $course                 =   Course::whereSlug($slug)->get()->first();
        $course->code               =   $request->code;
        $course->title              =   $request->title;
        $course->unit               =   $request->unit;
        $isUpdated                  =   $course->update();
        return $isUpdated;
    }

}