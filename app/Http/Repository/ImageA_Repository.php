<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 11/9/2016
 * Time: 8:46 AM
 */

namespace App\Http\Repository;


use App\ImageA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ImageA_Repository implements ImageA_Facade
{
    /**
     * Gets a single Solution image from the database
     * @return mixed
     */
    public function show($slug)
    {
        return ImageA::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single image for a solution to the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $destination = public_path() . "/OptionA_images/";
        $image                     =   new ImageA();
        $image->size               =   $request->size;
        $image->label              =   $request->label;
        $image->user_id            =   $request->user_id;
        $image->option_a_id         =   $request->option_a_id;
        $image->slug               =   uniqid();
        $image->visibility         =   1;

        if($file=$request->file('file')) {
            $filename = time().$file->getClientOriginalName();
            $file->move($destination, $filename);
        }
        $image->path   = "/OptionA_images/" . $filename;
        $isSaved                    =   $image->save();
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return ImageA::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $image                           =   ImageA::whereSlug($slug)->get()->first();
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
        $isFind = ImageA::whereSlug($slug)->get()->first();
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