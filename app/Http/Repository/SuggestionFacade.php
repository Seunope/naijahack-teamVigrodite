<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 10/5/2016
 * Time: 12:01 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface SuggestionFacade
{
    /**
     * @return mixed
     */
//    public function index();
    /**
     * @return mixed
     */
//    public function edit($slug);
    /**
     * @return mixed
     */
//    public function show($slug);

    /**
     * @param Request $request
     * @return bool
     */
    public function store(Request $request);
    /**
     * @param $slug
     * @return bool
     */
//    public function update(Request $request, $slug);


    /**
     * @param $id
     * @return bool
     */
    public function destroy($slug);
}