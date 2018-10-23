<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/14/2016
 * Time: 12:45 PM
 */

namespace App\Http\Repository;
use App\Comment;
use App\Question;
use Illuminate\Http\Request;

class CommentRepository implements CommentFacade
{
    /**
     * Gets all Comment from the database
     * @return mixed
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Gets a single Comment from the database for a particular question
     * @return mixed
     */
    public function show($slug)
    {
        return Comment::whereSlug($slug)->get()->first();
    }

    /**
     * Get Comments by question id
     * @param $id
     * @return mixed
     */
    public function CommentsById($id){
        return Comment::where('question_id', $id)->get()->all();
    }

    /**
     * Save a single Comment from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $comment                     =   new Comment();
        $comment->body               =   $request->body;
        $comment->user_id            =   $request->user_id;
        $comment->question_id        =   $request->question_id;
        $comment->slug               =   uniqid();
        $comment->visibility         =   1;
        $isSaved                     =   $comment->save();
        return $isSaved;
    }
    /**
     *
     * @return mixed
     */
    public function edit($slug)
    {
        return Comment::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $comment                       =   Comment::whereSlug($slug)->get()->first();
        $comment->body                 =   $request->body;
        $comment->edited               =   1;
        $isUpdated                     =   $comment->update();
        return $isUpdated;
    }

    /**
     * Delete a Answers in the data base
     *
     */
    public function destroy(Request $request, $slug)
    {
        $status                         =   "";
        $isFind                         =   false;
        $isFind                         = Comment::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status                 =   "Comment found and deleted successfully";
            }
            else {
                $status                 =   "Comment is not deleted but found";
            }
        }
        else{
            $status                     =    "Comment not found might have been deleted before";
        }
        return $status;
    }
}