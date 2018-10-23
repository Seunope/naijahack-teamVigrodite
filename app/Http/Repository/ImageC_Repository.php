<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 11/10/2016
 * Time: 12:58 PM
 */

namespace App\Http\Repository;
use App\ImageC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageC_Repository implements ImageC_Facade
{
    /**
     * Gets a single Solution image from the database
     * @return mixed
     */
    public function show($slug)
    {
        return ImageC::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single image for a solution to the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $destination = public_path() . "/OptionC_images/";
        $image                     =   new ImageC();
        $image->size               =   $request->size;
        $image->label              =   $request->label;
        $image->user_id            =   $request->user_id;
        $image->option_c_id         =   $request->option_c_id;
        $image->slug               =   uniqid();
        $image->visibility         =   1;

        if($file=$request->file('file')) {
            $filename = time().$file->getClientOriginalName();
            $file->move($destination, $filename);
        }
        $image->path   = "/OptionC_images/" . $filename;
        $isSaved                    =   $image->save();
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return ImageC::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $image                           =   ImageC::whereSlug($slug)->get()->first();
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
        $isFind = ImageC::whereSlug($slug)->get()->first();
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