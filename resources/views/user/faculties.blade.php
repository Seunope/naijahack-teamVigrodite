@extends('layouts.user-master')

@section('title', ' Faculties')


@section('description', Auth::user()->school->name.' faculties')
@section('keywords',   Auth::user()->school->name.' faculties')

@section('content')


    <div class="content">
        <div class="section background-opacity page-title set-height-top">
            <div class="container">
                <div class="page-title-wrapper"><!--.page-title-content--><h2 class="captions">faculties</h2>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="#">Faculties</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="section teacher-course section-padding">
            <div class="container teacher-course-wrapper">
                <div class="underline">Faculties</div>
                <div class="course-table">
                    <div class="outer-container" style="position: relative;">
                        <div class="inner-container" style="">
                            <div class="table-header">
                                <table class="edu-table-responsive">
                                    <thead>
                                    <tr class="heading-table">
                                        <th class="col-1">id</th>
                                        <th class="col-2">faculty </th>
                                        <th class="col-2">faculty in full</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="table-body">
                                <table class="edu-table-responsive table-hover">
                                    <tbody>
                                    @foreach($faculties as $faculty)
                                                <tr class="table-row">
                                                    <td class="col-1"><span>{{$num++}}</span></td>
                                                    <td class="col-2"><a href="#">{{$faculty->name or ''}}</a></td>
                                                    <td class="col-3"><span>{{$faculty->full_name or ''}}</span></td>
                                                </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection