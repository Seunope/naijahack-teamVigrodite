@extends('layouts.user-master-no-nav')

@section('title', ' Registration page')

@section('private-head')
    <script type="text/javascript" src="{{url('assets/js/jquery-2.1.4.min.js')}}"></script>
    <style>
        .loader_container{
            width: 16px;
            height:16px;
        }
        .loader{
            border:2px solid #86bc42;
            border-top: 2px solid #242c43;
            border-radius: 50%;
            width: 20px;
            height:20px;
            animation: spin 2s linear infinite;
        }
        @keyframes spin{
            0%{transform: rotate(0deg);}
            100%{transform: rotate(360deg);}
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.loader').hide();
            getLevels();
            $('#error_message').hide();
        });

        function validate_name() {
            if((document.getElementById("name").value.length<10) || (document.getElementById("name").value.length>30)) {
                $("#name_error").css({"color":"red","font-size":"11px"});
//                $("#submit_button").html("<div class="loader"></div>");
                $("#submit_button").attr("disabled","");
                $("#name_error").html("<small>Not a fullname <i class='glyphicon glyphicon-remove'></i> </small>");
            }
            else {
                $("#name_error").html("Full name <i class='glyphicon glyphicon-ok'></i>");
                $("#submit_button").removeAttr("disabled");
                $("#name_error").css({"color":"#86bc42","font-size":"14px"});
            }
        }

        function validate_password() {
            if((document.getElementById("password").value.length<10) || (document.getElementById("password").value.length>30)) {
                $("#password_error").css({"color":"red","font-size":"11px"});
                $("#submit_button").attr("disabled","");
                $("#password_error").html("<small>at least 8char <i class='glyphicon glyphicon-remove'></i> </small>");
            }
            else {
                $("#password_error").html("Password <i class='glyphicon glyphicon-ok'></i>");
                $("#submit_button").removeAttr("disabled");
                $("#password_error").css({"color":"#86bc42","font-size":"14px"});
            }
        }

        function getLevels() {
            var items;
            items+="<option value='0'>No Level yet</option>";
            $.get("/general/schools/create", function (data) {
                for (var i = 0; i <data.length; i++) {
                    items += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                }
                $("#level_id").html(items);
            });
        }

        function getDepartments() {
            $('.loader').show();
            var school_id = document.getElementById("school_id").value;
            var items = "";
            items+="<option value='0'>No Department yet</option>";
            var faculties;
            $.ajax({
                type:"GET",
                url:"/general/departments/"+school_id+"/edit",
                datatype:"json",
                async:false,
                success:function (data) {
                    faculties = data;
                }
            });
            $.get("/general/schools/"+school_id+"1/edit", function (data) {
                for (var i = 0; i <data.length; i++) {
                    for (var j = 0; j <faculties.length; j++) {
                        if (data[i].faculty_id==faculties[j].id) {
                            items += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                            break;
                        }
                    }
                };
                $("#department_id").html(items);
                $('.loader').hide();
            });
        };
    </script>
@endsection

@section('content')

    <div class="page-register rlp">
        <div class="container">
            <div class="register-wrapper rlp-wrapper">
                <div class="register-table rlp-table"><a href="/"><img src="/assets/images/logo-color-1.png" alt="" class="login"/></a>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="register-title rlp-title">sign up here, we made it all easy for you. <i class="fa fa-user"></i></div>
                        <div class="register-form bg-w-form rlp-form">
                            <div class="row text-center">
                                <div class="col-md-6"><label for="name" id="name_error" class="control-label form-label">Full name <span>*</span> <i id="name_status" class=""></i></label>
                                    <input id="name" type="text" onkeyup="validate_name();" name="name" placeholder="Fully written.." class="form-control form-input all-input"/><!--p.help-block Warning !-->
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6"><label for="regemail" class="control-label form-label">email <span>*</span></label>
                                    <input id="regemail" type="email" name="email" placeholder="Email..." class="form-control form-input all-input"/><!-- p.help-block Warning !-->
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6"><label for="school_id" class="control-label form-label">school <span>*</span></label>
                                    <select name="school_id" id="school_id" onchange="getDepartments();" class="form-control form-input all-input">
                                        <option>- School - </option>
                                        @if($schools!='')
                                            @foreach($schools as $school)
                                                <option value="{{ $school->id }}" >{{ $school->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <!-- p.help-block Warning !-->
                                    @if ($errors->has('school_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6"><label for="department_id" class="control-label form-label">department <span>*</span></label>
                                    <select name="department_id" id="department_id" class="form-control form-input all-input">
                                        <option>- Department - </option>
                                    </select>
                                    <!-- p.help-block Warning !-->
                                    @if ($errors->has('department_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6"><label for="level_id" class="control-label form-label">level <span>*</span></label>
                                    <select name="level_id" id="level_id" class="form-control form-input all-input"></select>
                                    <!-- p.help-block Warning !-->
                                    @if ($errors->has('department_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6"><label for="password" id="password_error" class="control-label form-label">password <span>*</span></label>
                                    <input id="password" name="password" onkeyup="validate_password()" type="password" placeholder="Password..." class="form-control form-input all-input"/><!-- p.help-block Warning !-->
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" id="submit_button" class="disabled registerButton" style="width: 100%"><span>Finish registration</span></button><!-- p.help-block Warning !-->
                                </div>
                                <div class="col-md-5"></div>
                                <div class="col-md-2"><div class="loader_container"><div class="loader"></div></div></div>
                                <div class="col-md-5"></div>
                            </div>
                        </div>
                    </form>
                    <span>You have free 20 coins waiting for you after registration.</span>
                </div>
            </div>
        </div>
    </div>
@endsection
