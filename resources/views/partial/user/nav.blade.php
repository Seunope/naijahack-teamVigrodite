<div class="header-main homepage-01" style="height: 47px">
    <div class="container">
        <div class="header-main-wrapper">
            <div class="navbar-header">
                <div class="logo pull-left hidden-xs hidden-sm" style="line-height:40px;">
                    <a href="/" class="">
                        <img src="/assets/images/logo-color-1.png" alt="Sol.ng logo" style="max-width:100px;" />
                    </a>
                </div>
                <div class="logo pull-left hidden-md hidden-lg" style="line-height:40px;">
                    <a href="/" class="">
                        <img src="/assets/images/logo-color-1.png" alt="Sol.ng" style="max-width:90px;vertical-align:middle;" />
                    </a>
                </div>
                <button type="button" data-toggle="collapse" data-target=".navigation" class="navbar-toggle edugate-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="navigation collapse navbar-collapse pull-right">
                <ul class="nav-links nav navbar-nav">
                    <li class="dropdown {{Request::path() == '/'? 'active' : ''}}">
                        <a href="{{ url('/') }}" class="main-menu">Home
                            {{--<span class="glyphicon glyphicon-home icons-dropdown"></span>--}}
                        </a>
                    </li>
                    @if(Auth::check() && Auth::user()->level_id != '0')
                        <li class="dropdown {{Request::path() == 'home/*'? 'active' : ''}}">
                            <a href="/home/{{Auth::user()->level->slug}}" class="main-menu">My Courses
                            </a>
                        </li>
                        <li class="dropdown {{Request::path() == 'home/*'? 'active' : ''}}">
                            <a href="/general/questions/create" style="line-height: 33px!important;" class="main-menu highlighted-nav">&nbsp;&nbsp;Upload a question</a>
                        </li>

                        @if (Auth::user()->level_id != '0' && Auth::user()->role_id<5)
                            <li class="dropdown">
                                <a href="/management" class="main-menu">Admin
                                </a>
                            </li>
                        @endif
                    @endif
                    <li class="dropdown {{Request::path() == 'select'? 'active' : ''}}">
                        <a href="/select" class="main-menu">CBT
                        </a>
                    </li>
                    <li class="dropdown {{Request::path() == 'search-result/*'? 'active' : ''}}">
                        <a href="/advanced-search" class="main-menu">Advanced Search
                        </a>
                    </li>
                    <li class="dropdown"><a href="/contact" class="main-menu">Contact<span class="fa fa-angle-down icons-dropdown"></span></a>
                        <ul class="dropdown-menu edugate-dropdown-menu-1" style="top: 50px;">
                            <li><a href="/suggestion" class="link-page">Submit A Suggestion</a></li>
                            <li><a href="/testimony" class="link-page">Say your testimony</a></li>
                        </ul>
                    </li>
                    @if(Auth::check())
                    <li class="dropdown"><a href="" class="main-menu">{{Auth::user()->name}}<span class="fa fa-angle-down icons-dropdown"></span></a>
                        <ul class="dropdown-menu edugate-dropdown-menu-1" style="top: 50px;">
                            <li><a href="/profile" class="link-page">Profile</a></li>
                            <li><a href="/questions/{{Auth::user()->slug}}/user" class="link-page">My uploads</a></li>
                            <li><a href="/logout" class="link-page">Logout</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="button-search"><p class="main-menu"><i class="glyphicon glyphicon-search"></i></p></li>
                    <div class="nav-search hide">
                        {!! Form::open(['method'=>'POST','action'=>'SearchController@search']) !!}
                        <input type="text" name="string" placeholder="Search" required class="searchbox"/>
                        <button type="submit" class="searchbutton fa fa-search"></button>
                        {!! Form::close() !!}
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</div>
