<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/24/2016
 * Time: 11:05 AM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;


interface UserFacade
{
    /**
     * @return mixed
     */
    public function showCourseById($id);

       /**
     * @return mixed
     */
    public function showOneCourse($slug);
    /**
     * @return mixed
     */
    public function showYearByCourse($id);
}