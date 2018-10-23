<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/19/2016
 * Time: 2:47 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface HelpfulFacade
{
    /**
     * @return mixed
     */
    public function index();

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
     * @param $id
     * @return bool
     */
    public function destroy($slug);
}