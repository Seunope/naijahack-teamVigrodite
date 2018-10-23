<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/2/2016
 * Time: 10:05 AM
 */

namespace App\Http\Repository;

use Illuminate\Http\Request;
interface DepartmentFacade
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
     * @param Request $request
     * @return bool
     */
    public function schoolAdminStore(Request $request);
    /**
     * @param $slug
     * @return bool
     */
    public function schoolAdminUpdate(Request $request, $slug);

    /**
     * @param $id
     * @return bool
     */
    public function schoolAdminDestroy($slug);
}