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
    Route::resource('admin/questions', 'AdminQuestionsController');
    Route::resource('admin/solutions', 'AdminSolutionsController');
    Route::get('admin/solutions/{slug}/create', 'AdminSolutionsController@create');
    Route::resource('admin/qimages', 'AdminQimagesController');
    Route::resource('admin/simages', 'AdminSimagesController');
    Route::resource('admin/cimages', 'AdminCimagesController');
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

    Route::get('admin/cimages/{slug}/create', 'AdminCimagesController@create');
    Route::get('admin/qimages/{slug}/create', 'AdminQimagesController@create');
    Route::get('admin/simages/{slug}/create', 'AdminSimagesController@create');
    Route::resource('admin/comments', 'AdminCommentsController');
    Route::get('admin/questions/{courseSlug}/{yearSlug}', 'AdminQuestionsController@index');
    //Users visibility
    Route::post('/visibility', 'AdminUsersController@visibility');
});
Route::group(['middleware'=>['auth','schoolAdmin','xss']], function () {
    Route::resource('schoolAdmin/faculties', 'SchoolAdminFacultiesController');
    Route::resource('schoolAdmin/departments', 'SchoolAdminDepartmentsController');
    Route::resource('schoolAdmin/courses', 'SchoolAdminCoursesController');
    Route::resource('schoolAdmin/questions', 'SchoolAdminQuestionsController');
    Route::resource('schoolAdmin/solutions', 'SchoolAdminSolutionsController');
    Route::get('schoolAdmin/solutions/{slug}/create', 'SchoolAdminSolutionsController@create');
    Route::resource('schoolAdmin/qimages', 'SchoolAdminQimagesController');
    Route::resource('schoolAdmin/simages', 'SchoolAdminSimagesController');
    Route::resource('schoolAdmin/cimages', 'SchoolAdminCimagesController');
    Route::get('schoolAdmin/simages/{slug}/create', 'SchoolAdminSimagesController@create');
    Route::get('schoolAdmin/cimages/{slug}/create', 'SchoolAdminCimagesController@create');
    Route::get('schoolAdmin/qimages/{slug}/create', 'SchoolAdminQimagesController@create');
    Route::resource('schoolAdmin/comments', 'SchoolAdminCommentsController');
    Route::get('schoolAdmin/questions/{courseSlug}/{yearSlug}', 'SchoolAdminQuestionsController@index');
});
Route::group(['middleware'=>['auth','departmentAdmin','xss']], function () {
    Route::get('departmentAdmin/department', 'DepartmentAdminDepartmentsController@index');
    Route::resource('departmentAdmin/courses', 'DepartmentAdminCoursesController');
    Route::resource('departmentAdmin/questions', 'DepartmentAdminQuestionsController');
    Route::resource('departmentAdmin/solutions', 'DepartmentAdminSolutionsController');
    Route::get('departmentAdmin/solutions/{slug}/create', 'DepartmentAdminSolutionsController@create');
    Route::resource('departmentAdmin/qimages', 'DepartmentAdminQimagesController');
    Route::resource('departmentAdmin/simages', 'DepartmentAdminSimagesController');
    Route::get('departmentAdmin/simages/{slug}/create', 'DepartmentAdminSimagesController@create');
    Route::resource('departmentAdmin/cimages', 'DepartmentAdminCimagesController');
    Route::get('departmentAdmin/qimages/{slug}/create', 'DepartmentAdminQimagesController@create');
    Route::get('departmentAdmin/cimages/{slug}/create', 'DepartmentAdminCimagesController@create');
    Route::resource('departmentAdmin/comments', 'DepartmentAdminCommentsController');
    Route::get('departmentAdmin/questions/{courseSlug}/{yearSlug}', 'DepartmentAdminQuestionsController@index');
});
Route::group(['middleware'=>['auth','courseAdmin','xss']], function () {
    Route::resource('courseAdmin/courses', 'CourseAdminCoursesController');
    Route::resource('courseAdmin/questions', 'CourseAdminQuestionsController');
    Route::resource('courseAdmin/solutions', 'CourseAdminSolutionsController');
    Route::get('courseAdmin/solutions/{slug}/create', 'CourseAdminSolutionsController@create');
    Route::resource('courseAdmin/qimages', 'CourseAdminQimagesController');
    Route::resource('courseAdmin/simages', 'CourseAdminSimagesController');
    Route::resource('courseAdmin/cimages', 'CourseAdminCimagesController');
    Route::get('courseAdmin/simages/{slug}/create', 'CourseAdminSimagesController@create');
    Route::get('courseAdmin/qimages/{slug}/create', 'CourseAdminQimagesController@create');
    Route::get('courseAdmin/cimages/{slug}/create', 'CourseAdminCimagesController@create');
    Route::resource('courseAdmin/comments', 'CourseAdminCommentsController');
    Route::get('courseAdmin/questions/{courseSlug}/{yearSlug}', 'CourseAdminQuestionsController@index');
});
Route::group(['middleware'=>['auth','completeProfile','xss']], function () {

    Route::get('/management', 'ManagementController@index');
    Route::get('/mailIndex', 'ManagementController@mailIndex');
    Route::get('/select', 'TestController@index');
    Route::post('/test', 'TestController@test');
    Route::get('/test', 'UsersController@goToHome');
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
    Route::get('questions/{userSlug}/user', 'UsersQuestionsController@user_question');
    Route::post('general/questions/{slug}', 'UsersQuestionsController@show');
    Route::get('general/questions/create', 'UsersQuestionsController@create');
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
    Route::resource('adminOptionsBs', 'OptionBsController');
    Route::resource('adminOptionsCs', 'OptionCsController');
    Route::resource('adminOptionsDs', 'OptionDsController');
});

Route::resource('mailToOne', 'MailToOneController');

Route::patch('/complete-profile/{slug}', 'UserDetailsController@update');
Route::get('/home', 'UsersController@index');
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::get('auth/school/{id}', 'Auth\AuthController@departments');
Route::resource('user/comments', 'UserCommentsController');
Route::resource('admin/helpfuls', 'HelpfulsController');
Route::resource('/mail', 'MailingController');
Route::post('adm/questions', 'ViewController@storeForAdmin');
Route::get('/complete-profile', 'UsersController@complete_profile');









//STATIC PAGES

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