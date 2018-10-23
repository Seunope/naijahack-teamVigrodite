<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 10/4/2016
 * Time: 12:10 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface ContactFacade
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