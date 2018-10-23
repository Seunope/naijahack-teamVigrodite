<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/4/2016
 * Time: 6:22 PM
 */

namespace App\Http\Repository;

use Illuminate\Http\Request;
use App\Question;
use App\Solution;
use Auth;

class SolutionRepository implements SolutionFacade
{
    /**
     * Gets all Answers from the database
     * @return mixed
     */
    public function index()
    {
        return Solution::all();
    }

    /**
     * Gets a single Answers from the database for a particular question
     * @return mixed
     */
    public function show($slug)
    {
        return Solution::whereSlug($slug)->get()->first();
    }

    /**
     * Get solution by question id
     * @param $id
     * @return mixed
     */
    public function solutionById($id){
        return Solution::where('question_id', $id)->get()->first();
    }

    /**
     * Save a single Answers from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $question                       = Question::where('slug', '=', $request->slug)->get()->first();
        $solution                     =   new Solution();
        $solution->body               =   $request->body;
        $solution->user_id               =   Auth::user()->id;
        $solution->question_id          =   $request->question_id;
        $solution->slug               =   uniqid();
        $isSaved                      =   $solution->save();
        $question->status             =   1;
        $isUpdated                  =   $question->update();
        return $isSaved;
    }
    /**
     *
     * @return mixed
     */
    public function edit($slug)
    {
        return Solution::whereSlug($slug)->get()->first();
    }
    /**
     * @param $slug
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $solution                 =   Solution::whereSlug($slug)->get()->first();
        $solution->body               =   $request->body;
        $solution->edited               =   1;
        $isUpdated                  =   $solution->update();
        return $data=[
            'solution'=>$solution,
            'isUpdated'=>$isUpdated,
        ];
    }

    /**
     * Delete a Answers in the data base
     *
     */
    public function destroy(Request $request, $slug)
    {
        $question                       = Question::where('slug', '=', $request->question_slug)->get()->first();
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Solution::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $question->status             =   0;
            $isUpdated                  =   $question->update();
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Solution found and deleted successfully";
            }
            else {
                $status            =   "Solution is not deleted but found";
            }
        }
        else{
            $status                =    "Solution not found might have been deleted before";
        }
        return $data=[
            'question'=>$question,
            'status'=>$status
        ];
    }
}