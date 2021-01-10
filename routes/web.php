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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('addmovies', 'MoviesController@addmovies')->name('addmovies');
Route::get('addcategories', 'CategoriesController@add_apicategories')->name('addcategories');
Route::get('movies', 'MoviesController@getmovies_list')->name('movies');
Route::get('settings', 'SettingController@settings')->name('setting');


Route::get('tags', 'TagsController@tags')->name('tags');

Route::get('addtags', 'TagsController@addtags')->name('addtags');

Route::get('video', 'VideoController@video')->name('video');

Route::get('add_video', 'VideoController@add_video')->name('add_video');


Route::post('addnewvideo', 'VideoController@addnewvideo')->name('addnewvideo');

Route::post('post.addnewtags', 'TagsController@addnewtags')->name('post.addnewtags');


Route::post('updatenewtags', 'TagsController@updatenewtags')->name('updatenewtags');

Route::get('news', 'LatestNewsController@recent_news')->name('news');

Route::get('addnews', 'LatestNewsController@addnews')->name('addnews');

Route::get('news.edit/{id}', 'LatestNewsController@editnews')->name('news.edit');

Route::get('news.delete/{id}', 'LatestNewsController@deletenews')->name('news.delete');

Route::post('post.addnews', 'LatestNewsController@addnewnews')->name('post.addnews');
Route::post('post.updatenews', 'LatestNewsController@updatenews')->name('post.updatenews');





Route::get('video.edit/{id}', 'VideoController@editvideo')->name('video.edit');

Route::get('video.delete/{id}', 'VideoController@deletevideo')->name('video.delete');

Route::post('updatevideo', 'VideoController@updatevideo')->name('updatevideo');







Route::get('settings-form/{id}', 'SettingController@settingsform')->name('settings-form');






Route::get('admin.surveys.new_row', 'SettingController@settingsform')->name('admin.surveys.new_row');

Route::get('surveys', [
    'as' => 'admin.surveys.list',
    'uses' => 'SurveyController@index',

]);

Route::get('surveys/add', [
    'as' => 'admin.surveys.create',
    'uses' => 'SurveyController@create',

]);

Route::get('surveys/add', [
    'as' => 'admin.surveys.create',
    'uses' => 'SurveyController@create',

]);

Route::get('surveys/edit/{id}', [
    'as' => 'admin.surveys.edit',
    'uses' => 'SurveyController@edit_service',

]);

Route::get('surveys/edit_save', [
    'as' => 'admin.surveys.edit_save',
    'uses' => 'SurveyController@edit_service',

]);

Route::post('surveys/save_edit_save', [
    'as' => 'admin.surveys.save_edit_save',
    'uses' => 'SurveyController@save_edit_service',

]);



Route::get('surveys/form/{id}', [
    'as' => 'admin.surveys.form',
    'uses' => 'SurveyController@surveys_form',

]);

Route::post('surveys/save_details', [
    'as' => 'admin.surveys.save_details',
    'uses' => 'SurveyDetailsController@save_details',

]);

Route::post('surveys/store', [
    'as' => 'admin.surveys.store',
    'uses' => 'SurveyController@store',

]);

Route::post('surveys/update_details', [
    'as' => 'admin.surveys.update_details',
    'uses' => 'SurveyDetailsController@update_details',

]);

Route::get('surveys/delete_service_feild/{id}', [
    'as' => 'admin.surveys.delete_service_feild',
    'uses' => 'SurveyDetailsController@delete_service_feild',

]);

Route::post('surveys/new_row', [
    'as' => 'admin.surveys.new_row',
    'uses' => 'SurveyDetailsController@new_row',

]);


Route::get('surveys/form/submissions/{id}', [
    'as' => 'admin.surveys.form.submissions',
    'uses' => 'SurveyController@surveys_form_submission',

]);
