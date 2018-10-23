<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/24/2016
 * Time: 11:05 AM
 */

namespace App\Http\Repository;
use App\Faculty;
use App\Question;
use App\School;
use App\User;
use App\Year;
use Illuminate\Http\Request;

use App\Course;

class UserRepository implements UserFacade
{
    /**
     * Gets all course by by faculty from the database
     * @return mixed
     */
    public function showCourseById($id)
    {
        return Course::where('level_id','=',5)->get()->all();
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
}