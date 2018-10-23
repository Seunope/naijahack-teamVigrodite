<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 10/5/2016
 * Time: 12:02 PM
 */

namespace App\Http\Repository;
use App\Suggestion;
use Illuminate\Http\Request;

class SuggestionRepository implements SuggestionFacade
{

    /**
     * Gets all faculty from the database
     * @return mixed
     */
    public function index()
    {
        return Suggestion::all();
    }
    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Suggestion::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single faculty from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $suggestion                     =   new Suggestion();
        $suggestion->name               =   $request->name;
        $suggestion->email              =   $request->email;
        $suggestion->body               =   $request->body;
        $suggestion->slug               =   uniqid();
        $isSaved                       =   $suggestion->save();
        return $isSaved;
    }

    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Suggestion::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Suggestion found and deleted successfully";
            }
            else {
                $status            =   "Suggestion is not deleted but found";
            }
        }
        else{
            $status                =    "Suggestion not found";
        }
        return $status;
    }
}