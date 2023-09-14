<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as Input;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\InviteController;
use App\Models\User;

//profil
Route::view('/home', 'home')->middleware(['auth','verified']);
Route::view('/profile/edit', 'profile.edit')->middleware('auth');
Route::view('/profile/password', 'profile.password')->middleware('auth');
Route::view('/profile/fa', 'profile/fa')->middleware('auth');


//Rôle
Route::middleware(['auth'])->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/roles', RolesController::class)->except('show');
    Route::resource('/permissions', PermissionController::class)->except('show');
    Route::post('/tickets/{ticket}/reponse', [TicketController::class, 'reponse'])->name('ticket.reponse');
    Route::resource('/tickets', TicketController::class);
    Route::resource('/invitationwait', InviteController::class)->names('invitewait');
});


//invitation email
Route::get('invite', 'App\Http\Controllers\InviteController@invite')->name('invite');
Route::post('invite', 'App\Http\Controllers\InviteController@process')->name('process');
// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'App\Http\Controllers\InviteController@accept')->name('accept');
//enregistrement par mail
Route::get('registeremail/{token}', 'App\Http\Controllers\InviteController@registeremail')->name('registeremail');

//utilisateur

Route::middleware(['auth'])->group(function(){
    Route::resource('/admin/users', UsersController::class)->names('crud')->except('show');
});

