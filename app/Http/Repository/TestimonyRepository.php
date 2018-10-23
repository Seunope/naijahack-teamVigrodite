<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 10/4/2016
 * Time: 7:39 PM
 */

namespace App\Http\Repository;
use Illuminate\Http\Request;

use App\Testimony;

class TestimonyRepository implements TestimonyFacade
{

    /**
     * Gets all faculty from the database
     * @return mixed
     */
    public function index()
    {
        return Testimony::all();
    }
    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Testimony::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single faculty from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $destination = public_path() . "/Testimony_images/";
        $testimony                     =   new Testimony();
        $testimony->name               =   $request->name;
        $testimony->email              =   $request->email;
        $testimony->body               =   $request->body;
        $testimony->slug               =   uniqid();
        if($file=$request->file('file')) {
            $filename = time().$file->getClientOriginalName();
            $file->move($destination, $filename);
        }
        $testimony->path   = "/Testimony_images/" . $filename;
        $isSaved                       =   $testimony->save();
        return $isSaved;
    }

    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Testimony::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Testimony found and deleted successfully";
            }
            else {
                $status            =   "Testimony is not deleted but found";
            }
        }
        else{
            $status                =    "Testimony not found";
        }
        return $status;
    }
}