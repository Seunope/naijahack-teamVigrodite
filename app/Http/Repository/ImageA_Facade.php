<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 11/9/2016
 * Time: 8:48 AM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface ImageA_Facade
{
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
}