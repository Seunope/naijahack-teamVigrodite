@extends('layouts.user-master-profile')

@section('title', 'Page Not Found')

@section('content')

<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
                <div class="page-404">
                    <div class="container">
                        <div class="wrapper-404">
                            <div class="title-404"><p class="signal">Oops, You are not Authorized to access this Page.</p><span class="sub">The page you are looking for might have been removed, had its name changed, or temporarily unavailable. Contact sol.ng for any question.</span>

                                <p class="warning">403</p>
                                <button onclick="window.location.href='/'" class="btn btn-404"><span>HOME</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection