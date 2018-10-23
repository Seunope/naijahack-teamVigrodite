<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/6/2016
 * Time: 2:08 PM
 */

namespace App\Http\Repository;

use App\Qimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QimageRepository implements QimageFacade
{
    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Qimage::whereSlug($slug)->get()->first();
    }

    /**
     * Get solution by question id
     * @param $id
     * @return mixed
     */
    public function imageById($id){
        return Qimage::where('question_id', $id)->get()->all();
    }
    /**
     * Save a single image for a question to the database
     * @return boolean
     */
    public function store(Request $request)
    {

        $destination = public_path() . "/Question_images/";
        $image                     =   new Qimage();
        $image->size              =   $request->size;
        $image->label              =   $request->label;
        $image->user_id             =   $request->user_id;
        $image->question_id             =   $request->question_id;
        $image->slug               =   uniqid();
        $image->visibility               =   1;
        if($file=$request->file('file')) {
            $filename = time().$file->getClientOriginalName();
            $file->move($destination, $filename);
        }
        $image->path   = "/Question_images/" . $filename;
        $isSaved                    =   $image->save();
        return $isSaved;
    }
    /**
     * @return mixed
     */
    public function edit($slug)
    {
        return Question::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $image                           =   Qimage::whereSlug($slug)->get()->first();
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
        $isFind = Qimage::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            unlink(public_path().$isFind->path);
//            $image=public_path().$isFind->file;
//            return $isFind->path;
            File::delete($isFind->path);
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