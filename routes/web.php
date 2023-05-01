<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as Input;
use App\Models\User;

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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');


Route::view('/home', 'home')->middleware(['auth','verified']);
Route::view('/profile/edit', 'profile.edit')->middleware('auth');
Route::view('/profile/password', 'profile.password')->middleware('auth');
Route::view('/profile/fa', 'profile/fa')->middleware('auth');



//administration des utilisateurs
Route::get('/admin/list.user',"App\Http\Controllers\AdminController@list")->name('listusers')->middleware('auth');   
//Route::get('/admin/action',"App\Http\Controllers\AdminController@destroy")->name('deleteusers')->middleware('auth');

Route::view('/admin/create', 'admin.create')->middleware('auth');

//crud utilisateur
Route::middleware('auth')->group(function () {
Route::resource('/users', UsersController::class);
Route::resource('/admin/crud', UsersController::class);
Route::resource('/admin/show', UsersController::class);
Route::resource('/admin/edit', UsersController::class);
Route::resource('/admin/delete', UsersController::class);
});



//recherche d'un utilisateur
Route::get('/search', function () {
    return view('admin/search');
})->middleware(['auth'])->name('searchh');

Route::post('/search', function(){
    $q = Input::get('q');
//dd($q);
    if($q != ''){
        $user = User::where('name','LIKE', '%' . $q .'%')
                        ->orWhere('email','LIKE', '%' . $q .'%')
                        ->get();
                        if(count($user) > 0){
                        return view('admin.search')->with('details', $user)->with('query', $q);
                        }else{
                            dd($user);
                            return view('admin.search')->with('aucun résultat trouvé');
                    }
     }   
})->middleware(['auth'])->name('search');



//invitation email
Route::get('invite', 'App\Http\Controllers\InviteController@invite')->name('invite');
Route::post('invite', 'App\Http\Controllers\InviteController@process')->name('process');
// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'App\Http\Controllers\InviteController@accept')->name('accept');







//ticket via le git
Route::post('tickets/media', 'TicketController@storeMedia')->name('tickets.storeMedia');
Route::post('tickets/comment/{ticket}', 'TicketController@storeComment')->name('tickets.storeComment');
Route::resource('tickets', 'TicketController')->only(['show', 'create', 'store']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Statuses
    Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusesController');

    // Priorities
    Route::delete('priorities/destroy', 'PrioritiesController@massDestroy')->name('priorities.massDestroy');
    Route::resource('priorities', 'PrioritiesController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Tickets
    Route::delete('tickets/destroy', 'TicketsController@massDestroy')->name('tickets.massDestroy');
    Route::post('tickets/media', 'TicketsController@storeMedia')->name('tickets.storeMedia');
    Route::post('tickets/comment/{ticket}', 'TicketsController@storeComment')->name('tickets.storeComment');
    Route::resource('tickets', 'TicketsController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentsController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
require __DIR__.'/auth.php';
require __DIR__.'/admin.php'; 