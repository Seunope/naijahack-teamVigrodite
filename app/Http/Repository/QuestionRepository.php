<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 9/3/2016
 * Time: 5:19 PM
 */

namespace App\Http\Repository;

use App\CorrectOption;
use App\User;
use Illuminate\Http\Request;
use App\Question;
use App\Year;
use App\Topic;
use Auth;
use App\Course;
use Illuminate\Support\Facades\Mail;
class QuestionRepository implements QuestionFacade
{
    /**
     * Gets all Question from the database
     * @param $courseSlug
     * @param $yearSlug
     * @return mixed
     */


    public function index($courseSlug, $yearSlug)
    {
        $course = Course::where('slug', '=', $courseSlug)->get()->first();
        $year = Year::where('slug', '=', $yearSlug)->get()->first();
        $topics = Topic::lists('name', 'id')->unique()->all();
        $questions = Question::where('course_id','=',$course->id)
            ->where('year_id','=',$year->id)->orderByRaw('LENGTH(number)')->orderBy('number')->get()->all();
        $users=User::where('department_id',$course->department_id)
            ->where('id', '!=', Auth::user()->id)
            ->lists('name', 'id')->put(0, 'Me('.Auth::user()->name.')')->reverse()->all();
        return $data=[
            'users'=>$users,
            'course'=>$course,
            'year'=>$year,
            'topics'=>$topics,
            'questions'=>$questions
        ];
    }

    /**
     * Gets a single Question from the database
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {
        return Question::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single Question to the database
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        if (($request->topic) !=null){
            $topic = Topic::create(['name'=>$request->topic,'course_id'=>$request->course_id, 'user_id'=>Auth::user()->id]);
            $topic_id = $topic->id;
        }
        else {
            $topic_id = $request->topic_id;
        }
        $course=Course::where('id',$request->course_id)->get()->first();
        $question                     =   new Question();
        $question->body               =   $request->body;
        $question->user_id            =   $request->user_id;
        $question->poster_id          =   Auth::user()->id;
        $question->number             =   $request->number;
        if ($course->type==1){$question->type=1;}
        if (isset($request->isExam)){$question->isExam =   $request->isExam;}
        $question->course_id          =   $request->course_id;
        $question->year_id            =   $request->year_id;
        $question->topic_id           =   $topic_id;
        $question->status             =   0;
        $question->slug               =   uniqid();
        $isSaved                      =   $question->save();
        if ($course->type==1)
        {
            $correctOption                     =   new CorrectOption();
            $correctOption->question_id             =   $question->id;
            $correctOption->slug                =   uniqid();
            $correctOption->save();
        }
//        $data=[
//            'title'=>'New question uploaded'.$question->number,
//            'content'=>'New Question has been uploaded to sol.ng, question number: '.$question->number .'Course: '.$question->course->code.' school: '.$question->course->school->name,
//        ];
//        Mail::send('email.text',$data,function ($message){
//            $message->to('opeyemi@sol.ng', Auth::user()->name)->subject('New question uploaded');
//            $message->to('lihamad@sol.ng', Auth::user()->name)->subject('New question uploaded');
//        }
//        );
        return $isSaved;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function edit($slug)
    {
        return Question::whereSlug($slug)->get()->first();
    }

    /**
     * @param Request $request
     * @param $slug
     * this method is for updating questions based on the slug beign provided
     * @return bool
     */
    public function update(Request $request, $slug)
    {
        $question                 =   Question::whereSlug($slug)->get()->first();
        if (($request->topic) !=null){$topic                        =   $request->topic;}
        else $topic = "pending";
        $question->body               =   $request->body;
        $question->number             =   $request->number;
        // $question->course_id          =   $request->course_id;
        // $question->year_id            =   $request->year_id;
        $question->topic              =   $topic;
        $isUpdated                    =   $question->update();
        return $isUpdated;
    }

    /**
     *Delete Question in the database
     * @param $slug
     * @return bool|string
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Question::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Question found and deleted successfully";
            }
            else {
                $status            =   "Question is not deleted but found";
            }
        }
        else{
            $status                =    "Question not found";
        }
        return $status;
    }






















//    USER INTERFACE

    /**
     * Gets all course by by faculty from the database
     * @param $cid
     * @param $yid
     * @param $isExam
     * @return mixed
     */
    public function showQuestionsById($cid, $yid, $isExam)
    {
        if (Auth::user()->role_id<4)
        {
            return Question::where('course_id','=',$cid)
                ->where('year_id','=',$yid)
                ->where('isExam','=',$isExam)
                ->orderBy('number')
                ->get()->all();
        }
        else
        {
            return Question::where('course_id','=',$cid)
                ->where('visibility',1)
                ->where('year_id','=',$yid)
                ->where('isExam','=',$isExam)
                ->orderBy('number')
                ->get()->all();
        }
    }

    /**
     * Gets all course by by faculty from the database
     * @param $cid
     * @param $yid
     * @param $isExam
     * @return mixed
     */
    public function showUserQuestionsByUserId($userSlug)
    {
        $user = User::where('slug', '=', $userSlug)->get()->first();
        if (Auth::user()->role_id<4)
        {
            return Question::where('','=',$user->id)
                ->orderBy('number')
                ->get()->all();
        }
        else
            return '';
    }

    /**
     * Gets all course by by faculty from the database
     * @param $cid
     * @param $number
     * @return mixed
     */
    public function cbtByCourseOnly($cid, $number)
    {
        $questions=Question::where('course_id','=',$cid)
            ->where('IsOption',1)->orwhere('IsOption',0)->get();
        if (count($questions)>=$number) {
            return Question::where('course_id','=',$cid)
                ->where('IsOption',1)->get()->random($number);
        }
        else
            return "0";
    }

    /**
     * Gets all course by by faculty from the database
     * @param $courseId
     * @param $yearId
     * @param $number
     * @return mixed
     */
    public function cbtByCourseAndYear($courseId, $yearId, $number)
    {
        $questions=Question::where('course_id','=',$courseId)
            ->where('year_id',$yearId)
            ->where('IsOption',1)->orwhere('IsOption',0)->get();
        if (count($questions)>=$number) {
            return Question::where('course_id','=',$courseId)
                ->where('year_id',$yearId)
                ->where('IsOption',1)
                ->get()->random($number);
        }
        else
            return "0";
    }

    /**
     * Gets a single course from the database
     * @param $slug
     * @return mixed
     */
    public function showOneQuestion($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }

    /**
     * Gets a single course from the database
     * @param $id
     * @return mixed
     */
    public function showYearByQuestion($id)
    {
//        return Course::where('slug','=',$slug)->get()->first();
//        return Solution::where('question_id', $id)->get()->first();
        return Question::where('course_id','=',$id)
            ->groupBy('year_id')
            ->get()
            ->all();
    }

    /**
     * Gets all Question from the database
     * @param $courseSlug
     * @param $yearSlug
     * @return mixed
     */
    public function userIndex($courseSlug, $yearSlug)
    {
        $course = Course::where('slug', '=', $courseSlug)->get()->first();
        $year = Year::where('slug', '=', $yearSlug)->get()->first();
        $questions = Question::where('course_id','=',$course->id)
            ->where('year_id','=',$year->id)->orderBy('number')->get()->all();
        return $data=[
            'course'=>$course,
            'year'=>$year,
            'questions'=>$questions
        ];
    }


    /**
     * Gets a single Question from the database
     * @param $slug
     * @return mixed
     */
    public function userShow($slug)
    {
        return Question::whereSlug($slug)->orderBy('id', 'desc')->get()->first();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function userEdit($slug)
    {
        return Question::whereSlug($slug)->get()->first();
    }

    /**
     * @param Request $request
     * @param $slug
     * @return bool
     */
    public function userUpdate(Request $request, $slug)
    {
        $question                 =   Question::whereSlug($slug)->get()->first();
        if (($request->topic) !=null){$topic                        =   $request->topic;}
        else $topic = "pending";
        $question->body               =   $request->body;
        $question->number             =   $request->number;
        $question->topic           =   $topic;
        $isUpdated                  =   $question->update();
        return $isUpdated;
    }


}