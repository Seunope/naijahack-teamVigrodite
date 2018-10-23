<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/19/2016
 * Time: 7:45 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

interface ViewFacade
{

    public function store(Request $request, $slug);
    public function storeForAdmin(Request $request);


    /**
     * @param $id
     * @return bool
     */
    public function destroy($slug);
}