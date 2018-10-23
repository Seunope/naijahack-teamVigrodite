@extends('layouts.user-master')

@section('title', $department->name ." -". $department->full_name ." -".$department->faculty->school->name)
@section('description', 'Get questions under '. $department->name ." -". $department->full_name ." -".$department->faculty->school->name)
@section('keywords', $department->name ." past questions,".$department->name .",".$department->full_name .','. $department->faculty->school->name.','. $department->faculty->school->name .'past questions')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-9">
                {{--table begins --}}
                <div class="section teacher-course section-padding">
                    <div class="section-container">
                        @php $total = 0; $i=0; @endphp
                        @foreach ($department->courses as $course)
                            @php $i+=1;
                        $cour[$i] = count(DB::table('questions')->where('course_id', $course->id)->get());
                        $total+=$cour[$i];
                            @endphp
                        @endforeach
                        {{--                    @if($total>0)--}}
                        <div class="underline">
                            Courses in {{$department->full_name}} ({{$total or ''}} Qs)
                        </div>
                        <div class="course-table">
                            <div class="outer-container">
                                <div class="inner-container">
                                    <div class="table-body">
                                        @foreach ($levels as $level)
                                            @php $courses = DB::table('courses')->where('level_id', $level->id)->where('department_id', $department->id)->get(); @endphp
                                            <h4>{{$level->name or ''}} Level courses</h4>
                                            @if(count($courses)>0)
                                                <table class="edu-table-responsive table-hover">
                                                    <thead>
                                                    <tr class="heading-table">
                                                        <th class="col-1">id</th>
                                                        <th class="col-2">Course </th>
                                                        <th class="col-3">Course title</th>
                                                        <th class="col-4">Total Qs and As</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $number=0; $totalCourse = 0; $ii=0; @endphp
                                                    @foreach ($courses as $course)
                                                        @php $ii+=1; $number ++;
                                                    $cour[$ii] = count(DB::table('questions')->where('course_id', $course->id)->get());
                                                    $totalCourse+=$cour[$ii];
                                                        @endphp
                                                        <tr class="table-row" >
                                                            <td class="col-1"><span>{{$number or ''}}.</span></td>
                                                            <td class="col-2" title="{{$course->title or ''}}">
                                                                <a href="/general/courses/{{$course->slug or ''}}">{{$course->code or ''}}</a>
                                                            </td>
                                                            <td class="col-3"><span>{{$course->title or '' }}</span></td>
                                                            <td class="col-4"><span>{{$totalCourse}}</span></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <table class="edu-table-responsive table-hover">
                                                    <tbody>
                                                    <tr class="table-row" >
                                                        <td colspan="4" class="col-1"><span style="color:indianred">
                                                        !No courses for this level yet, inbox info@sol.ng to help.
                                                        </span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--table ends --}}



            </div>
            @include('partial.user.sidebar')
        </div>
    </div>
@endsection




