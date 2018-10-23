<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 11/10/2016
 * Time: 12:56 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface ImageB_Facade
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