<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/3/2016
 * Time: 5:19 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface QuestionFacade
{
    /**
     * @param $courseSlug
     * @param $yearSlug
     * @return mixed
     */
    public function index($courseSlug, $yearSlug);

    /**
     * @param $slug
     * @return mixed
     */
    public function edit($slug);

    /**
     * @param $slug
     * @return mixed
     */
    public function show($slug);
    /**
     * @param Request $request
     * @return bool
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug);


    /**
     * @param $slug
     * @return bool
     * @internal param $id
     */
    public function destroy($slug);




//    USER INTERFACE

    /**
     * @param $courseSlug
     * @param $yearSlug
     * @param $isExam
     * @return mixed
     */
    public function showUserQuestionsByUserId($userSlug);

    /**
     * @param $courseSlug
     * @param $yearSlug
     * @param $isExam
     * @return mixed
     */
    public function showQuestionsById($courseSlug, $yearSlug, $isExam);

    /**
     * @param $slug
     * @return mixed
     */
    public function showOneQuestion($slug);

    /**
     * @param $id
     * @return mixed
     */
    public function showYearByQuestion($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function userEdit($slug);

    /**
     * @param $slug
     * @return mixed
     */
    public function userShow($slug);

    /**
     * @param Request $request
     * @param $slug
     * @return bool
     */
    public function userUpdate(Request $request, $slug);

}