<div class="col-md-3 col-sm-12 sidebar layout-right">
    <div class="row">
        <div class="clearfix"></div>
        <div class="category-widget widget col-sm-12 col-md-12 col-xs-12 sd380">
            <div class="title-widget">Sidebar Menu</div>
            <div class="content-widget">
                <ul class="category-widget list-unstyled">
                    @if(Auth::check())

                        <li><a href="" class="link cat-item"><span class="pull-left">Home</span></a></li>
                        <li><a href="/profile" class="link cat-item"><span class="pull-left">Profile</span></a></li>
                        {{--<li><a href="" class="link cat-item"><span class="pull-left">Upload a question</span></a></li>--}}
                        <li><a href="/general/schools" class="link cat-item"><span class="pull-left">All schools in sol.ng</span><span class="pull-right">@if(Auth::check()){{count(\App\School::all())}}@endif</span></a></li>
                        <li><a href="/courses" class="link cat-item"><span class="pull-left">Courses of my school -{{Auth::user()->school->name}}</span><span class="pull-right">@if(Auth::check()){{count(Auth::user()->school->courses)}}@endif</span></a></li>
                        <li><a href="/logout" class="link cat-item"><span class="pull-left">Logout</span></a></li>
                    @else
                        <li><a href="/general/schools" class="link cat-item"><span class="pull-left">All schools in sol.ng</span><span class="pull-right">@if(Auth::check()){{count(\App\School::all())}}@endif</span></a></li>
                        {{--<li><a href="/courses" class="link cat-item"><span class="pull-left">Courses of my school</span><span class="pull-right">@if(Auth::check()){{count(\App\Course::all())}}@endif</span></a></li>--}}
                        <li><a href="/login" class="link cat-item"><span class="pull-left">Login</span></a></li>
                        {{--<li><a href="/courses" class="link cat-item"><span class="pull-left">Courses of my department </span><span class="pull-right">97</span></a></li>--}}
                        {{--<li><a href="categories.html" class="link cat-item"><span class="pull-left"></span><span class="pull-right">56</span></a></li>--}}
                        {{--<li><a href="categories.html" class="link cat-item"><span class="pull-left">Video</span><span class="pull-right">24</span></a></li>--}}
                        {{--<li><a href="categories.html" class="link cat-item"><span class="pull-left">Miscellaneous</span><span class="pull-right">13</span></a></li>--}}
                    @endif
                </ul>
            </div>
        </div>
        <div class="tag-widget widget col-sm-6 col-md-12 col-xs-6 sd380">
            <div class="title-widget">tags</div>
            <div class="content-widget">
                <ul class="tag-widget list-unstyled">
                    <li><a href="/about" class="tag-item">About us</a></li>
                    <li><a href="/contact" class="tag-item">Contact</a></li>
                    {{--<li><a href="#" class="tag-item">Photography</a></li>--}}
                    {{--<li><a href="#" class="tag-item">Communication</a></li>--}}
                    {{--<li><a href="#" class="tag-item">Tutorial</a></li>--}}
                    {{--<li><a href="#" class="tag-item">Biology</a></li>--}}
                    {{--<li><a href="#" class="tag-item">Photoshop</a></li>--}}
                    {{--<li><a href="#" class="tag-item">Economics</a></li>--}}
                    {{--<li><a href="#" class="tag-item">Statistics</a></li>--}}
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="share-widget widget col-sm-6 col-md-12 col-xs-6 sd380">
            <div class="title-widget">share times on social media</div>
            <div class="content-widget">
                <div class="socials social-widget">
                    <a href="https://facebook.com/sol4ng" class="link facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://plus.google.com/communities/115896551858053813824" target="_blank" class="link google"><i class="fa fa-google-plus"></i></a>
                    <a href="https://mobile.twitter.com/solng_official" target="_blank" class="link twitter"><i class="fa fa-twitter"></i></a>
                    {{--<a href="#" class="link pinterest"><i class="fa fa-pinterest"></i></a>--}}
                    {{--<a href="#" class="link blog"><i class="fa fa-rss"></i></a><a href="#" class="link dribbble"><i class="fa fa-dribbble"></i></a><a href="#" class="link tumblr"><i class="fa fa-tumblr"></i></a></div>--}}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
