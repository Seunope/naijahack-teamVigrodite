<div class="section">
    <div class="search-input">
        <div class="">
            <div class="search-input-wrapper small_search_panel">
                {!! Form::open(['method'=>'GET','role'=>'search','action'=>'SearchController@search']) !!}
                {!! Form::text('string', null,['class'=>'searchInput', 'required'=>'', 'placeholder'=>'Search your question...','style'=>'background-color: white']) !!}
                <button class="searchButton"><span class="fa fa-search visible-sm visible-xs hidden-lg hidden-md"></span><span class="hidden-xs hidden-sm">Search now</span></button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>