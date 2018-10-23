<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 2/9/2017
 * Time: 12:25 PM
 */

namespace App\Http\Repository;
use App\HundredAdmin;
use App\User;
use Illuminate\Http\Request;

use App\Hundred;

class LevelAdminRepository  implements LevelAdminFacade
{

    /**
     * assign a 100L admin
     * @return boolean
     */
    public function hundred_store(Request $request)
    {

        $levelAdmin                 =   new HundredAdmin();
        $levelAdmin->department_id  =   $request->department_id;
        $levelAdmin->user_id        =   $request->user_id;
        $levelAdmin->slug           =   uniqid();
        $user=User::where('id',$request->user_id)->get()->first();
        if (isset($user)){
            if ($user->role_id>3) {
                User::where('id',$request->user_id)->update(['role_id'=>3]);
            }
        }
        $isSaved                    =   $levelAdmin->save();
        return $isSaved;
    }
    /**
     * @param $slug
     * @return bool
     */
    public function hundred_update(Request $request, $slug)
    {
        $hundredAdmin    =   HundredAdmin::whereSlug($slug)->get()->first();
        if(isset($hundredAdmin->user))
        {
            if($hundredAdmin->user->role_id>2)
            {
                $isDepartmentAdmin=Department::where('user_id',$department->user_id)->get()->all();
                $countDepartment=count($isDepartmentAdmin);
                if($countDepartment<1)
                {
                    User::where('id',$department->user_id)->update(['role_id'=>3]);
                }
                else
                {
                    $isCourseAdmin=Course::where('user_id',$department->user_id)->get()->all();
                    $countCourse=count($isCourseAdmin);
                    if($countCourse>0)
                    {
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
     * save a newly assigned Department level admin for 200L
     * @param Request $request
     * @return bool
     */
    public function two_hundred_store(Request $request)
    {
        // TODO: Implement two_hundred_store() method.
    }

    /**
     * Update a Department level admin for 200L
     * @param $slug
     * @return bool
     */
    public function two_hundred_update(Request $request, $slug)
    {
        // TODO: Implement two_hundred_update() method.
    }

    /**
     * save a newly assigned Department level admin for 300L
     * @param Request $request
     * @return bool
     */
    public function three_hundred_store(Request $request)
    {
        // TODO: Implement three_hundred_store() method.
    }

    /**
     * Update a Department level admin for 300L
     * @param $slug
     * @return bool
     */
    public function three_hundred_update(Request $request, $slug)
    {
        // TODO: Implement three_hundred_update() method.
    }

    /**
     * save a newly assigned Department level admin for 400L
     * @param Request $request
     * @return bool
     */
    public function four_hundred_store(Request $request)
    {
        // TODO: Implement four_hundred_store() method.
    }

    /**
     * Update a Department level admin for 400L
     * @param $slug
     * @return bool
     */
    public function four_hundred_update(Request $request, $slug)
    {
        // TODO: Implement four_hundred_update() method.
    }

    /**
     * save a newly assigned Department level admin for 500L
     * @param Request $request
     * @return bool
     */
    public function five_hundred_store(Request $request)
    {
        // TODO: Implement five_hundred_store() method.
    }

    /**
     * Update a Department level admin for 500L
     * @param $slug
     * @return bool
     */
    public function five_hundred_update(Request $request, $slug)
    {
        // TODO: Implement five_hundred_update() method.
    }
}