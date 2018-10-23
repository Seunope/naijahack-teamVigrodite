<?php

namespace App\Http\Controllers;

use App\Course;
use App\Question;
use App\Year;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{

    /**
     * Display advanced search page with a list of courses and years
     *
     * @return \Illuminate\Http\Response
     */
    public function advancedSearch()
    {
        $years      = Year::lists('name', 'id')->all();
        $courses    = Course::lists('code', 'id')->all();
        $numbers    = ['1a','1ai','1aii'];
        return view('user.advance-search', ['years'=>$years, 'courses'=>$courses, 'numbers'=>$numbers]);
    }

    /**
     * Display a listing result of what a user seached for.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'string' => 'required|max:255',
        ]);
        $string    = $request->string;
        $questions = Question::where('body','LIKE','%'.$string.'%')->paginate(20)->appends(['string' => $string]);
        $noq = Question::where('body','LIKE','%'.$string.'%')->get();
        return view('user.search-page', ['questions' => $questions, 'string' => $string, 'noq'=>count($noq)]);
    }

    /**
     * Display a list of search result from advanced search.
     *
     * @return \Illuminate\Http\Response
     */
    public function advanced_search(Request $request)
    {
        $course_id=$request->course_id;
        $year_id=$request->year_id;
        $number =$request->number;
        $questions = Question::where('course_id',$course_id)->where('year_id',$year_id)->where('number','LIKE','%'.$number.'%')->paginate(20);
        return view('user.search-page',['questions'=>$questions, 'noq'=>count($questions)]);
    }
}
