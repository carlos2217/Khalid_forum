<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "App\Http\Controllers\BlogFrontEndController@index")->name('welcome');
Route::get('/blog/{post}', "App\Http\Controllers\BlogFrontEndController@show")->name('blog.show');
Route::get('/blog/{tag}/tag', "App\Http\Controllers\BlogFrontEndController@tag")->name('blog.tag');
Route::get('/blog/{category}/category', "App\Http\Controllers\BlogFrontEndController@category")->name('blog.category');

Route::get('/descussions', "App\Http\Controllers\DiscussinFrontEndController@index")->name('discussions');
Route::get('/descussions/{discussion}', "App\Http\Controllers\DiscussinFrontEndController@show")->name('discussions.show');
Auth::routes();


route::group(["prefix" => "dashboard", "middleware" => "auth"], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    route::group(['prefix' => '/blog/panel'], function () {
        route::get('/', 'App\Http\Controllers\HomeController@blog')->name('blog');
        route::get('posts', 'App\Http\Controllers\PostController@index')->name('posts.index');
        route::get('posts/c&&e', 'App\Http\Controllers\PostController@create')->name('posts.create')->middleware('create.post');
        route::get('posts/c&&e/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
        route::put('posts/c&&e/{post}/edit-post', 'App\Http\Controllers\PostController@update')->name('post.update');
        route::DELETE('posts/{post}/delete-post', 'App\Http\Controllers\PostController@destroy')->name('post.destroy');
        route::get('posts/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
        route::post('posts/c&&e/store-post', 'App\Http\Controllers\PostController@store')->name('post.store');
        route::get('trahded-posts/', 'App\Http\Controllers\PostController@poststrashed')->name('posts.trashed')->middleware('post.trash');
        route::put('trahded-posts/{posts}/restore', 'App\Http\Controllers\PostController@restore')->name('post.restore');
    });
    route::group(['prefix' => '/discussion/panel'], function () {
        route::get('/', 'App\http\Controllers\HomeController@discussion')->name('discussion');
        route::get('/discussions', 'App\http\Controllers\DiscussionController@index')->name('discussion.index');
        route::get('/discussions/c&&e', 'App\http\Controllers\DiscussionController@create')->name('discussion.create');
        route::post('/discussions/c&&e/store-discussion', 'App\http\Controllers\DiscussionController@store')->name('discussion.store');
        route::get('/discussions/{discussion}', 'App\http\Controllers\DiscussionController@show')->name('discussion.show');
        route::get('discussions/c&&e/{discussion}/edit', 'App\Http\Controllers\DiscussionController@edit')->name('discussion.edit');
        route::put('discussions/c&&e/{discussion}/discussion-update', 'App\Http\Controllers\DiscussionController@update')->name('discussion.update');
        route::delete('discussions/{discussion}/delete-post', 'App\Http\Controllers\DiscussionController@destroy')->name('discussion.destroy');
        route::get('trahded-discussions/', 'App\Http\Controllers\DiscussionController@trash')->name('discussion.trashed')->middleware('discussion.trash');
        route::put('trahded-discussions/{discussions}/restore', 'App\Http\Controllers\DiscussionController@restore')->name('discussion.restore');
    });
    // route::group(function () {
    route::get('categories', 'App\Http\Controllers\CategoryController@index')->name('categories.index');
    route::get('categories/{category}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
    route::put('categories/{category}/edit-category', 'App\Http\Controllers\CategoryController@update')->name('category.update');
    route::post('categories/store-category', 'App\Http\Controllers\CategoryController@store')->name('category.store');
    // });
    // route::group(function () {
    route::get('tags', 'App\Http\Controllers\TagController@index')->name('tags.index');
    route::get('tags/{tag}/edit', 'App\Http\Controllers\TagController@edit')->name('tag.edit');
    route::put('tags/{tag}/edit-tag', 'App\Http\Controllers\TagController@update')->name('tag.update');
    route::post('tags/store-tag', 'App\Http\Controllers\TagController@store')->name('tag.store');
    // });
    route::get('profile/{profile}', "App\Http\Controllers\AdminController@profile")->name('admin.profile');
    route::get('profile/{profile}/edit', "App\Http\Controllers\AdminController@profileEdit")->name('admin.profile.edit');
    route::put('profile/{profile}/update-profile', "App\Http\Controllers\AdminController@profileUpdate")->name('admin.profile.update');

    Route::group(['prefix' => "admin", "middleware" => 'isAdmin'], function () {
        route::get('all-users', "App\Http\Controllers\AdminController@allusers")->name('admin.allusers');
        route::put('all-users/{user}/make-as-admin', "App\Http\Controllers\AdminController@makeAsAdmin")->name('admin.makeAsAdmin');
        route::put('all-users/{user}/remove-Admtion-admin', "App\Http\Controllers\AdminController@removeAdmin")->name('admin.removeAdmin');
        route::get('settings/{setting}/edit', "App\Http\Controllers\AdminController@settingEdit")->name('admin.setting.edit');
        route::put('settings/{setting}/update-setting', "App\Http\Controllers\AdminController@settingUpdate")->name('admin.setting.update');
    });
});
// Route::group(['middleware' => ['auth', 'role:superadministrator']], function () {
// });
