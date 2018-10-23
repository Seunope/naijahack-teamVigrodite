<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/19/2016
 * Time: 7:45 PM
 */

namespace App\Http\Repository;
use App\View;
use App\Credit;
use Illuminate\Http\Request;
use Auth;
class ViewRepository implements ViewFacade
{
    /**
     * Save a single Helpful from the database
     * @return boolean
     */
    public function store(Request $request, $slug)
    {
//        $credit                     =   Credit::where('slug','=',$request->credit_slug)->get()->first();
//        $credit->value = $credit->value-1;
//        $credit->update();
        $view                   =   new View();
        $view->user_id          =   Auth::user()->id;
        $view->question_id      =   $slug;
        $isSaved                =   $view->save();
        return $isSaved;
    }

      /**
     * Save a single Helpful from the database
     * @return boolean
     */
    public function storeForAdmin(Request $request)
    {
        $view                   =   new View();
        $view->user_id          =   $request->user_id;
        $view->question_id      =   $request->question_id;
        $isSaved                =   $view->save();
        return $isSaved;
    }
    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Helpful::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "View found and deleted successfully";
            }
            else {
                $status            =   "View is not deleted but found";
            }
        }
        else{
            $status                =    "View not found";
        }
        return $status;
    }
}