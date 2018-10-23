<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 11/10/2016
 * Time: 12:56 PM
 */

namespace App\Http\Repository;
use App\ImageB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageB_Repository implements ImageB_Facade
{
    /**
     * Gets a single Solution image from the database
     * @return mixed
     */
    public function show($slug)
    {
        return ImageB::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single image for a solution to the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $destination = public_path() . "/OptionB_images/";
        $image                     =   new ImageB();
        $image->size               =   $request->size;
        $image->label              =   $request->label;
        $image->user_id            =   $request->user_id;
        $image->option_b_id         =   $request->option_b_id;
        $image->slug               =   uniqid();
        $image->visibility         =   1;

        if($file=$request->file('file')) {
            $filename = time().$file->getClientOriginalName();
            $file->move($destination, $filename);
        }
        $image->path   = "/OptionB_images/" . $filename;
        $isSaved                    =   $image->save();
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return ImageB::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $image                           =   ImageB::whereSlug($slug)->get()->first();
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
        $isFind = ImageB::whereSlug($slug)->get()->first();
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