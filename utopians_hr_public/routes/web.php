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


/* Auth */
Auth::routes([
  'register' => false,
  'verify' => false,
  'reset' => false
]);

/* Storge Link */
Route::get('/foo', function () {
    Artisan::call('storage:link');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/birthdayWeek', 'HomeController@birthdayWeek')->name('birthdayWeek');

Route::post('addvolunteer', 'VolunteersController@addvolunteer')->name('addvolunteer');


Route::get('volunteer/{volunteer}/acceptvolunteer', 'VolunteersController@acceptvolunteer')->name('acceptvolunteer');
Route::get('volunteer/{volunteer}/editvolunteer', 'VolunteersController@editvolunteer')->name('editvolunteer');
Route::get('volunteer/{volunteer}/dismissvolunteer', 'VolunteersController@dismissvolunteer')->name('dismissvolunteer');

Route::post('volunteer/{volunteer}/updatevolunteer', 'VolunteersController@updatevolunteer')->name('updatevolunteer');
Route::post('volunteer/{volunteer}/updateacceptvolunteer', 'VolunteersController@updateacceptvolunteer')->name('updateacceptvolunteer');
Route::post('volunteer/{volunteer}/updatedismissvolunteer', 'VolunteersController@updatedismissvolunteer')->name('updatedismissvolunteer');


Route::get('/volunteersutopianscounts', 'VolunteersController@volunteersutopianscounts')->name('volunteersutopianscounts');
Route::get('/volunteersrequestcounts', 'VolunteersController@volunteersrequestcounts')->name('volunteersrequestcounts');



Route::get('/browseteachersrequest', 'VolunteersController@browseteachersrequest')->name('browseteachersrequest');
Route::get('/browsecurriculumrequest', 'VolunteersController@browsecurriculumrequest')->name('browsecurriculumrequest');
Route::get('/browsecoordinatingrequest', 'VolunteersController@browsecoordinatingrequest')->name('browsecoordinatingrequest');
Route::get('/browsestudentrequest', 'VolunteersController@browsestudentrequest')->name('browsestudentrequest');
Route::get('/browsedesignrequest', 'VolunteersController@browsedesignrequest')->name('browsedesignrequest');
Route::get('/browsetechnicalrequest', 'VolunteersController@browsetechnicalrequest')->name('browsetechnicalrequest');
Route::get('/browsemarketingrequest', 'VolunteersController@browsemarketingrequest')->name('browsemarketingrequest');
Route::get('/browsehrrequest', 'VolunteersController@browsehrrequest')->name('browsehrrequest');


Route::get('/browsevolunteers', 'VolunteersController@browsevolunteers')->name('browsevolunteers');
Route::get('/browseutopians','VolunteersController@browseutopians')->name('browseutopians');


Route::get('volunteer/{volunteer}/stopvolunteer', 'VolunteersController@stopvolunteer')->name('stopvolunteer');
Route::post('volunteer/{volunteer}/updatestopvolunteer', 'VolunteersController@updatestopvolunteer')->name('updatestopvolunteer');
Route::get('volunteer/{volunteer}/trashvolunteer', 'VolunteersController@trashvolunteer')->name('trashvolunteer');
Route::post('volunteer/{volunteer}/updatetrashvolunteer', 'VolunteersController@updatetrashvolunteer')->name('updatetrashvolunteer');
Route::get('volunteer/{volunteer}/deletevolunteer', 'VolunteersController@deletevolunteer')->name('deletevolunteer');
Route::post('volunteer/{volunteer}/updatedeletevolunteer', 'VolunteersController@updatedeletevolunteer')->name('updatedeletevolunteer');

Route::get('/browsestopvolunteer','VolunteersController@browsestopvolunteer')->name('browsestopvolunteer');
Route::get('volunteer/{volunteer}/morevolunteer', 'VolunteersController@morevolunteer')->name('morevolunteer');


/* routes file upload */

// Create file upload form
Route::get('file/{volunteer}/pic', 'FileUploadController@pic')->name('pic');
Route::get('file/{volunteer}/doc', 'FileUploadController@doc')->name('doc');
// Store file
Route::post('/upload-file', 'FileUploadController@fileUpload')->name('fileUpload');
// Store pic
Route::post('/upload-pic', 'FileUploadController@picUpload')->name('picUpload');
















