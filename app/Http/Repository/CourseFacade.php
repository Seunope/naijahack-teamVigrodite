<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/2/2016
 * Time: 4:04 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;
use App\Course;
interface CourseFacade
{
    /**
     * @return mixed
     */
    public function index();
    /**
     * @return mixed
     */
    public function edit($slug);
    /**
     * @return mixed
     */
    public function show($slug);

    /**
     * @param Request $request
     * @return bool
     */
    public function store(Request $request);
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug);


    /**
     * @param $id
     * @return bool
     */
    public function destroy($slug);


//    USER INTERFACE


    /**
     * @return mixed
     */
    public function showCourseById($slug);

    /**
     * @return mixed
     */
    public function showOneCourse($slug);
    /**
     * @return mixed
     */
    public function showYearByCourse($id);

















    /**
     * @return mixed
     */
    public function schoolAdminIndex();
    /**
     * @return mixed
     */
    public function schoolAdminEdit($slug);
    /**
     * @return mixed
     */
    public function schoolAdminShow($slug);

    /**
     * @param $slug
     * @return bool
     */
    public function schoolAdminUpdate(Request $request, $slug);






























    /**
     * @return mixed
     */
    public function departmentAdminIndex();
    /**
     * @return mixed
     */
    public function departmentAdminEdit($slug);
    /**
     * @return mixed
     */
    public function departmentAdminShow($slug);

    /**
     * @param $slug
     * @return bool
     */
    public function departmentAdminUpdate(Request $request, $slug);





    /**
     * @return mixed
     */
    public function courseAdminIndex();
    /**
     * @return mixed
     */
    public function courseAdminEdit($slug);
    /**
     * @return mixed
     */
    public function courseAdminUpdate(Request $request, $slug);
}

