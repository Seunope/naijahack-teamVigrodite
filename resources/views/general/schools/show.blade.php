@extends('layouts.user-master')
@section('title', 'Departments under '.$school->name.' -'.$school->full_name.' with available past questions')
@section('description', 'Departments under '.$school->name.' -'.$school->full_name. ' that has their past questions and answers available here')
@section('keywords', $school->name .','.$school->name .' past questions,'.$school->full_name )

@section('content')


    <div class="row">
        <div class="col-md-9">
            {{--table begins --}}
            <div class="section teacher-course section-padding">
                <div class=" section-container">
                    <div class="icon-course">
                        @if(isset($school->path[15]))
                            <img src="{{$school->path or ''}}" id="school-image" alt="">
                        @endif
                    </div>
                    @php $total = 0; $i=0; @endphp
                    @foreach ($school->courses as $course)
                        @php $i+=1;
                               $cour[$i] = count(DB::table('questions')->where('course_id', $course->id)->get());
                                $total+=$cour[$i];
                        @endphp
                    @endforeach
                    @if($total>0)
                    <div class="underline">
                        Departments in {{$school->name or ''}} ({{$total or ''}} Qs)
                    </div>
                    <div class="course-table">
                        <div class="outer-container">
                            <div class="inner-container">
                                <div class="table-body">
                                    <table class="edu-table-responsive table-hover">
                                        <thead>
                                        <tr class="heading-table">
                                            <th class="col-1">id</th>
                                            <th class="col-2">Department </th>
                                            <th class="col-3">Faculty</th>
                                            <th class="col-4">Total Qs and As</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php( $number = 0)
                                        @foreach($school->faculties as $faculty)
                                            @foreach($faculty->departments as $department)
                                                @php( $number +=1)
                                                @php $total = 0; $i=0; @endphp
                                                @foreach ($department->courses as $course)
                                                    @php $i+=1;
                                                       $cour[$i] = count(DB::table('questions')->where('course_id', $course->id)->get());
                                                        $total+=$cour[$i];
                                                    @endphp
                                                @endforeach
                                                <tr class="table-row" >
                                                    <td class="col-1"><span>{{$number or ''}}.</span></td>
                                                    <td class="col-2" title="{{$department->full_name or ''}}">
                                                        <a href="/general/departments/{{$department->slug or ''}}">{{$department->name .' ('. $department->full_name.')'}}</a>
                                                    </td>
                                                    <td class="col-3"><span>{{$department->faculty->name or '' }}</span></td>
                                                    <td class="col-4"><span>{{$total or ''}}</span></td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="underline">
                            No Departments for {{$school->name or ''}} yet, inbox info@sol.ng to help.
                        </div>
                    @endif
                </div>
            </div>
            {{--table ends --}}
        </div>
        @include('partial.user.sidebar')
    </div>
    <!-- LOADING SCRIPTS FOR PAGE-->

@endsection




