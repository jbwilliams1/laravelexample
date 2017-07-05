<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

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

/** Static / Information Routes **/
Route::get('/', 'HomeController@index');
Route::get('/about', ['as' => 'about', 'uses' => 'AboutController@index']);

/** Contact Form Routes **/
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
Route::post('/contact', 'ContactController@sendContact');
Route::post('/referral', 'ContactController@sendReferral');


/** Blog / Post Routes **/
Route::get('/blogs', ['as' => 'blogs', 'uses' => 'BlogController@index']);
Route::get('/blog/{slug}', ['as' => 'blogview', 'uses' => 'BlogController@getBlogBySlug']);


/** Admin Routes **/
Route::get('/admin', ['as' => 'dashboard', 'uses' => 'AdminController@index']);

/** Admin Event Routes **/
Route::get('/admin/events', ['as' => 'events', 'uses' => 'AdminController@getEvents']);
Route::post('/admin/events/add', 'AdminController@addEvent');
Route::post('/admin/events/edit', 'AdminController@editEvent');
Route::bind('event', function($id) {
    return App\Models\Event::where('id', $id)->first();
});
Route::get('/admin/events/delete/{event}', function($event) {
    $event->delete();

    return redirect('/admin/events')->with('message', '<div class="alert alert-success">Successfully deleted event.</div>');
});

/** Admin Pages Routes */
Route::get('/admin/pages', ['as' => 'pages', 'uses' => 'PageController@getPages']);
Route::post('/admin/page/create', 'PageController@createPage');
Route::get('/admin/page/edit/{page_id}', 'PageController@getEditPage', function($page_id){});
Route::post('/admin/page/edit/{page_id}', 'PageController@updatePage');
Route::bind('page', function($id) {
    return App\Models\Page::where('id', $id)->first();
});

/** Admin Blogs Routes */
Route::get('/admin/blogs', ['as' => 'blogslist', 'uses' => 'BlogController@getBlogs']);
Route::post('/admin/blog/create', 'PageController@createBlog');
Route::get('/admin/blog/edit/{page_id}', ['as'=>'editBlog', 'uses' => 'BlogController@getEditBlog'], function($page_id){});
Route::post('/admin/blog/edit/{page_id}', 'BlogController@updateBlog');
Route::post('/admin/blog/upload', 'BlogController@getUploadedPhoto');
Route::bind('blog', function($id) {
    return App\Models\Page::where('id', $id)->first();
});

/** Admin auth routes **/
Route::get('/admin/login', ['as' => 'login', 'uses' => 'AdminController@getLogin']);
Route::post('/admin/login', ['as' => 'login', 'uses' => 'AdminController@login']);
Route::get('/admin/setup', ['as' => 'setup', 'uses' => 'AdminController@getSetup']);
Route::post('/admin/setup', ['as' => 'newSetup', 'uses' => 'AdminController@setup']);

/** Wildcard route to catch custom created pages by their slug **/
Route::get('/{slug}', 'PageController@getPage', function($slug){});