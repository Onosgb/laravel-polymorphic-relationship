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

use App\Staff;
use App\Photo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {
    $staff = Staff::findOrFail(1);

    $staff->photos()->create(["path"=> "Laravel.jpg"]);
});

Route::get('/read', function() {
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $role) {
        echo $role;
    }
});

Route::get('/update', function(){
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo) {
        if($photo->id === 8) {
            $photo->update(['path'=>'Onos.jpg']);
        }
    }
});

Route::get('/delete', function(){
    $staff = Staff::findOrFail(1);
    $staff->photos()->whereId(8)->delete();
});

// Method to assign photo to a staff or share photo to a staff
Route::get('/assign', function(){
    $staff = Staff::findOrFail(1);
    $photo = Photo::findOrFall(1);
    $staff->photos()->save($photo);
});