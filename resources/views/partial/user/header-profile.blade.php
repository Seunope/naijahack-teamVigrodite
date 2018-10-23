<div class="section hidden-sm hidden-xs hidden-md ">
    <div class="search-input">
        <div class="container">
            <div class="search-input-wrapper small_search_panel">
                <div class="row">
                    <div class="col-md-4 col-xs-5">
                        <div class=" small-image no-margin-padding">
                            <img src="{{Auth::user()->path}}" alt="" class="img-responsive small_image img-circle"/>
                        </div>
                        <h5 class="white-color no-margin-padding img-responsive">{{Auth::user()->name}}</h5>
                    </div>
                    <div class="col-md-8 col-xs-7">
                        <div class="pull-right">
                            {!! Form::open(['method'=>'GET','role'=>'search','action'=>'SearchController@search']) !!}
                                <input type="text" placeholder="Search any past question" name="string" class="form-input col-lg-7 "/>
                                <button type="submit" class="btn btn-blue col-lg-4"><span>search <i class="fa fa-search"></i></span></button>
                                <div class="clearfix"></div>
                            {!! Form::close() !!}
                            {{--<form><select class="form-select style-1 selectbox col-md-2 col-xs-5">--}}
                                    {{--<option value="all">all categories</option>--}}
                                    {{--<option value="languages">languages</option>--}}
                                    {{--<option value="science">science</option>--}}
                                {{--</select><select class="form-select style-2 selectbox col-md-2 col-xs-5">--}}
                                    {{--<option value="price">price</option>--}}
                                    {{--<option value="datetime">datetime</option>--}}
                                    {{--<option value="teacher">teacher</option>--}}
                                {{--</select>--}}
                                {{--<input type="text" placeholder="Do you want to learn today?" class="form-input col-md-5 col-xs-10"/>--}}
                                {{--<button type="submit" class="btn btn-blue col-md-2 col-xs-10"><span>search <i class="fa fa-search"></i></span></button>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
