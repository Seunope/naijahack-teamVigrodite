<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 2/9/2017
 * Time: 12:26 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface levelAdminFacade
{
    /**
     * save a newly assigned Department level admin for 100L
     * @param Request $request
     * @return bool
     */
    public function hundred_store(Request $request);
    /**
     * Update a Department level admin for 100L
     * @param $slug
     * @return bool
     */
    public function hundred_update(Request $request, $slug);



    /**
     * save a newly assigned Department level admin for 200L
     * @param Request $request
     * @return bool
     */
    public function two_hundred_store(Request $request);
    /**
     * Update a Department level admin for 200L
     * @param $slug
     * @return bool
     */
    public function two_hundred_update(Request $request, $slug);



    /**
     * save a newly assigned Department level admin for 300L
     * @param Request $request
     * @return bool
     */
    public function three_hundred_store(Request $request);
    /**
     * Update a Department level admin for 300L
     * @param $slug
     * @return bool
     */
    public function three_hundred_update(Request $request, $slug);



    /**
     * save a newly assigned Department level admin for 400L
     * @param Request $request
     * @return bool
     */
    public function four_hundred_store(Request $request);
    /**
     * Update a Department level admin for 400L
     * @param $slug
     * @return bool
     */
    public function four_hundred_update(Request $request, $slug);



    /**
     * save a newly assigned Department level admin for 500L
     * @param Request $request
     * @return bool
     */
    public function five_hundred_store(Request $request);
    /**
     * Update a Department level admin for 500L
     * @param $slug
     * @return bool
     */
    public function five_hundred_update(Request $request, $slug);

}