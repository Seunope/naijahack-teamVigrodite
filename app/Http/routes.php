<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::group(['middleware'=>['auth','superAdmin','xss']], function () {
    Route::resource('admin/schools', 'AdminSchoolsController');
    Route::resource('admin/testimonies', 'TestimonyController');
    Route::resource('admin/suggestions', 'SuggestionController');
    Route::resource('admin/faculties', 'AdminFacultiesController');
    Route::resource('admin/departments', 'AdminDepartmentsController');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/semesters', 'AdminSemestersController');
    Route::resource('admin/years', 'AdminYearsController');
    Route::resource('admin/levels', 'AdminLevelsController');
    Route::resource('admin/roles', 'AdminRolesController');
    Route::resource('admin/courses', 'AdminCoursesController');
    Route::post('hundred_admin_store', 'LevelAdminController@hundred_store');
    Route::post('two_hundred_admin_store', 'LevelAdminController@two_hundred_store');
    Route::post('three_hundred_admin_store', 'LevelAdminController@three_hundred_store');
    Route::post('four_hundred_admin_store', 'LevelAdminController@four_hundred_store');
    Route::post('five_hundred_admin_store', 'LevelAdminController@five_hundred_store');

    Route::get('hundred_admin_edit/{slug}', 'LevelAdminController@hundred_edit');
    Route::get('two_hundred_admin_edit', 'LevelAdminController@two_hundred_edit');
    Route::get('three_hundred_admin_edit', 'LevelAdminController@three_hundred_edit');
    Route::get('four_hundred_admin_edit', 'LevelAdminController@four_hundred_edit');
    Route::get('five_hundred_admin_edit', 'LevelAdminController@five_hundred_edit');

    Route::post('hundred_admin_update', 'LevelAdminController@hundred_update');
    Route::post('two_hundred_admin_update', 'LevelAdminController@two_hundred_update');
    Route::post('three_hundred_admin_update', 'LevelAdminController@three_hundred_update');
    Route::post('four_hundred_admin_update', 'LevelAdminController@four_hundred_update');
    Route::post('five_hundred_admin_update', 'LevelAdminController@five_hundred_update');

    //Users visibility
    Route::post('/visibility', 'AdminUsersController@visibility');
});
Route::group(['middleware'=>['auth','schoolAdmin','xss']], function () {
    Route::resource('schoolAdmin/faculties', 'SchoolAdminFacultiesController');
    Route::resource('schoolAdmin/departments', 'SchoolAdminDepartmentsController');
    Route::resource('schoolAdmin/courses', 'SchoolAdminCoursesController');
});
Route::group(['middleware'=>['auth','departmentAdmin','xss']], function () {
    Route::get('departmentAdmin/department', 'DepartmentAdminDepartmentsController@index');
    Route::resource('departmentAdmin/courses', 'DepartmentAdminCoursesController');
});
Route::group(['middleware'=>['auth','courseAdmin','xss']], function () {
    Route::resource('courseAdmin/courses', 'CourseAdminCoursesController');
});
Route::group(['middleware'=>['auth','completeProfile','xss']], function () {

//Question related route common to all levels of admin
    Route::get('admin/questions/{slug}/edit', 'AdminQuestionsController@edit');
    Route::get('admin/questions/{courseSlug}/{yearSlug}', 'AdminQuestionsController@index');
    Route::resource('admin/questions', 'AdminQuestionsController');


    Route::resource('admin/solutions', 'AdminSolutionsController');
    Route::get('admin/solutions/{slug}/create', 'AdminSolutionsController@create');
    Route::resource('admin/simages', 'AdminSimagesController');
    Route::get('admin/simages/{slug}/create', 'AdminSimagesController@create');

    Route::get('admin/qimages/{slug}/create', 'AdminQimagesController@create');
    Route::resource('admin/qimages', 'AdminQimagesController');

    Route::resource('admin/comments', 'AdminCommentsController');
    Route::resource('admin/cimages', 'AdminCimagesController');
    Route::get('admin/cimages/{slug}/create', 'AdminCimagesController@create');


    //
    Route::get('/management', 'ManagementController@index');
    Route::get('/mailIndex', 'ManagementController@mailIndex');
    Route::get('/select', 'TestController@index');
    Route::post('/cbt_test_going_on', 'TestController@test');
    Route::get('/cbt_test_going_on', 'UsersController@goToHome');
    Route::post('/submitTest', 'TestController@submitTest');
    Route::get('/review', 'TestController@review');
    Route::get('/courses', 'UsersController@courses');
    //Question Visibility
    Route::post('/questionVisibility', 'ManagementController@questionVisibility');
    //courses
    Route::get('/courses', 'UsersController@courses');
    //faculties
    Route::get('/faculties', 'UsersController@faculties');
    //home
    Route::get('/home/{slug}', 'UsersController@home');
    //course
    Route::get('/course/{slug}', 'UsersController@course');
    //users profile
    Route::get('/profile', 'UsersController@profile');
    //users profile
    Route::get('/profile/{name}/{slug}', 'UsersController@user_profile');
    //get more coin
    Route::get('/get-coin', 'UsersController@get_coin');
    //edit profile
    Route::get('/edit-profile', 'UsersController@edit_profile');
    //update profile
    Route::patch('/edit-profile/{slug}', 'UserDetailsController@update_profile');
    //question view
    Route::resource('question/views', 'ViewController');
    //question view
    Route::get('question/views', 'UsersController@goToHome');

    Route::resource('general/questions', 'UsersQuestionsController');
    Route::get('/general/questions/{courseSlug}/{yearSlug}/{isExam}', 'UsersQuestionsController@index');
    Route::post('general/questions/{slug}', 'UsersQuestionsController@show');
    Route::resource('general/solutions', 'UsersSolutionsController');
    Route::resource('general/qimages', 'UsersQimagesController');
    Route::resource('general/simages', 'UsersSimagesController');
    Route::resource('general/cimages', 'UsersCimagesController');
    Route::get('general/simages/{slug}/create', 'UsersSimagesController@create');
    Route::get('general/qimages/{slug}/create', 'UsersQimagesController@create');
    Route::get('general/cimages/{slug}/create', 'UsersCimagesController@create');

    Route::resource('imageA', 'ImageAsController');
    Route::resource('imageB', 'ImageBsController');
    Route::resource('imageC', 'ImageCsController');
    Route::resource('imageD', 'ImageDsController');
    Route::resource('correctOption',  'CorrectOptionsController');
    Route::resource('adminOptionsAs', 'OptionAsController');
    Route::resource('adminAllOptions', 'AllOptionsController');
    Route::resource('adminOptionsBs', 'OptionBsController');
    Route::resource('adminOptionsCs', 'OptionCsController');
    Route::resource('adminOptionsDs', 'OptionDsController');
});
Route::resource('general/schools', 'UsersSchoolsController');
Route::resource('general/departments', 'UsersDepartmentsController');
Route::resource('general/courses', 'UsersCoursesController');


Route::resource('mailToOne', 'MailToOneController');

Route::patch('/complete-profile/{slug}', 'UserDetailsController@update');
Route::get('/home', 'UsersController@index');
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::resource('user/comments', 'UserCommentsController');
Route::resource('admin/helpfuls', 'HelpfulsController');
Route::resource('/mail', 'MailingController');
Route::post('adm/questions', 'ViewController@storeForAdmin');
Route::get('/complete-profile', 'UsersController@complete_profile');

//advancedSearch
Route::get('/advanced-search', 'SearchController@advancedSearch');
//about
Route::get('/about', 'UsersController@about');
//404
Route::get('/404', 'UsersController@notFound');
//404
Route::get('/403', 'UsersController@notAuthorized');
//FAQ
Route::get('/faq', 'UsersController@faq');
//index view
Route::get('/', 'UsersController@index');
//index search
Route::any('search-result', 'SearchController@search');

Route::post('advanced-search/', 'SearchController@advanced_search');
//contact view
Route::get('/contact', 'ContactController@contact');
//contact store
Route::post('/contact', 'ContactController@store');
//contact view
Route::get('/testimony', 'TestimonyController@testimony');
//contact store
Route::post('/testimony', 'TestimonyController@store');
//contact view
Route::get('/suggestion', 'SuggestionController@suggestion');
//contact store
Route::post('/suggestion', 'SuggestionController@store');
//get more coin
Route::post('/credit', 'AdminUsersController@credit');
//inbox sol.ng on the course you want to handle
Route::get('/inbox', 'UsersController@inbox');












































//Route::group( [ 'prefix' => 'admin' ], [ 'middleware' => 'auth', function()
//{
//    Route::get('dashboard', function() {} );
//});