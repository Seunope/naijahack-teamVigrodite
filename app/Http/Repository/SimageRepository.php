<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/7/2016
 * Time: 4:14 PM
 */

namespace App\Http\Repository;
use App\Simage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SimageRepository implements SimageFacade
{
    /**
     * Gets a single Solution image from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Simage::whereSlug($slug)->get()->first();
    }

    /**
     * Get solution by question id
     * @param $id
     * @return mixed
     */
    public function simageById($id){
        return Simage::where('solution_id', $id)->get()->all();
//        return Simage::where('solution_id', $id)->where('visibility', 1)->get()->all();
    }
    /**
     * Save a single image for a solution to the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $destination = public_path() . "/Solution_images/";
        $image                     =   new Simage();
        $image->size               =   $request->size;
        $image->label              =   $request->label;
        $image->user_id            =   $request->user_id;
        $image->solution_id        =   $request->solution_id;
        $image->slug               =   uniqid();
        $image->visibility         =   1;
        if($file=$request->file('file')) {
            $filename = time().$file->getClientOriginalName();
            $file->move($destination, $filename);
        }
        $image->path   = "/Solution_images/" . $filename;
        $isSaved                    =   $image->save();
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return Simage::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $image                              =   Simage::whereSlug($slug)->get()->first();
        $image->size                     =   $request->size;
        $image->label                    =   $request->label;
        $image->visibility               =   $request->visibility;
        $isSaved                         =   $image->update();
        return $isSaved;
    }

    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Simage::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            unlink(public_path().$isFind->path);
//            $image=public_path().$isFind->file;
//            File::delete($isFind->path);
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Image found and deleted successfully";
            }
            else {
                $status            =   "Image is not deleted but found";
            }
        }
        else{
            $status                =    "Image not found";
        }
        return $status;
    }
}