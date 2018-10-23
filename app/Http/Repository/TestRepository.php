<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 1/24/2017
 * Time: 9:25 AM
 */

namespace App\Http\Repository;
use App\Course;
use App\Year;
use App\Test;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestRepository implements TestFacade
{
    /**
     * @return mixed
     */
    public function index()
    {
        $years      = Year::lists('name', 'slug')->put(0,'Random (Recommended)')->all();
        $courses    = Course::where('type',1)->where('school_id',Auth::user()->school_id)->lists('code', 'slug')->all();
        $numbers    = [5=>'5 Questions (Short test)',15=>'15 Questions(Standard test)',35=>'35 Questions (Standard exam)'];
        $time       = [6=>'6 minutes (Short test)',15=>'15 minutes (Standard test)',40=>'40 minutes (Standard exam)',60=>'1 Hour (Standard MTH exam )'];
        $data       = ['years'=>$years, 'time'=>$time, 'courses'=>$courses, 'numbers'=>$numbers];
        return $data;
    }

    /**
     * @return mixed
     */
    public function edit($slug)
    {
        //
    }
//
//    /**
//     * @return mixed
//     */
//    public function show($slug)
//    {
//        // TODO: Implement show() method.
//    }
//
//    /**
//     * @param Request $request
//     * @return bool
//     */
////    public function store(Request $request)
////    {
////        // TODO: Implement store() method.
////    }
//
//    /**
//     * @param $slug
//     * @return bool
//     */
//    public function update(Request $request, $slug)
//    {
//        // TODO: Implement update() method.
//    }
//
//    /**
//     * @param $id
//     * @return bool
//     */
//    public function destroy(Request $request, $slug)
//    {
//        // TODO: Implement destroy() method.
//    }
}