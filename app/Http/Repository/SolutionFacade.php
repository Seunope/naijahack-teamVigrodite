<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/4/2016
 * Time: 6:21 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface SolutionFacade
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
    public function destroy(Request $request, $slug);
}