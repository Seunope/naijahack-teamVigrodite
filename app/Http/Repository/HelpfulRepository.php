<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/19/2016
 * Time: 2:47 PM
 */

namespace App\Http\Repository;

use App\Helpful;
use Illuminate\Http\Request;
class HelpfulRepository implements HelpfulFacade
{
    /**
     * Gets all Helpful from the database
     * @return mixed
     */
    public function index()
    {
        return Helpful::all();
    }

    /**
     * Gets a single Helpful from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Helpful::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single Helpful from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $helpful                 =   new Helpful;
        $helpful->user_id           =   $request->user_id;
        $helpful->comment_id           =   $request->comment_id;
        $helpful->slug           =   uniqid();
        $isSaved                =   $helpful->save();
        return $isSaved;
    }
    /**
     *
     */
    public function destroy($slug)
    {
//        $isDeleted = [
//            'message' => "School not found",
//            'return' => false
//        ];
//
//        $deleteModel = School::find($slug);
//        if ($deleteModel != null) {
//            $isDeletedA = $deleteModel->delete();
//            if ($isDeletedA) {
//                $isDeleted['message'] = "School is deleted";
//                $isDeleted['return'] = true;
//            } else {
//                $isDeleted['message'] = "School is not deleted but found";
//                $isDeleted['return'] = false;
//            }
//        }
//        return $isDeleted;
//
//

        $status                   =   "";
        $isFind                     =   false;
        $isFind = Helpful::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "School found and deleted successfully";
            }
            else {
                $status            =   "School is not deleted but found";
            }
        }
        else{
            $status                =    "School not found";
        }
        return $status;
    }


}