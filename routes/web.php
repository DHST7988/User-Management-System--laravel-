<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Gate;
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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;
Route::view('/', 'userSelectionV2');
Route::view('/login/citizen', 'auth/citizenLogin');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Auth::routes();
Route::get('/login/staff', [LoginController::class, 'staffLoginForm']);
Route::get('/login/member', [LoginController::class,'memberLoginForm']);

Route::get('/register/staff', [RegisterController::class,'staffRegisterForm']);
Route::get('/register/member', [RegisterController::class,'memberRegisterForm']);
Route::get('/register/citizen', [RegisterController::class,'CitizenRegisterForm']);
Route::post('/login/staff', [LoginController::class,'staffLogin']);
Route::post('/login/member', [LoginController::class,'memberLogin']);
Route::post('/login/citizen', [LoginController::class,'citizenLogin']);
Route::post('/register/staff', [RegisterController::class,'createStaff']);
Route::post('/register/member', [RegisterController::class,'createMember']);
Route::post('/register/citizen', [RegisterController::class,'createCitizen']);
Route::get('cases/check', [CaseController::class, 'checkModelTable']);
Route::get('events', [EventController::class, 'getEvent']);
Route::get('case/{id}', [CaseController::class, 'caseDetail']);
Route::get('cases', [CaseController::class, 'getCases']);
Route::get('project/{id}', [ProjectController::class, 'projectDetail']);
Route::get('projects', [ProjectController::class, 'getProjects']);


Route::get('logout', [LoginController::class,'logout']);
Route::view('/contact_us', 'contact_us');
Route::view('/bob', 'bob');
Route::view('/adun', 'yb_profile');
Route::group(['middleware' => 'auth:staff'], function () { 
    Route::get('home/staff', [HomeController::class, 'home']);
    //Public Case Part
    Route::get('cases/createform', [CaseController::class, 'displayForm']);
    Route::post('cases/create', [CaseController::class, 'createCase']);
    Route::get('cases/edit/{id}', [EventController::class, 'editForm']);
    Route::post('cases/edit/{id}', [EventController::class, 'editCase']);
    Route::get('cases/delete/{id}',[EventController::class,'deleteCase']);
    //Event Part
    Route::get('events/create', [EventController::class, 'displayForm']);
    Route::post('events/create', [EventController::class, 'createEvent']);
    Route::get('events/edit/{id}', [EventController::class, 'editForm']);
    Route::post('events/edit/{id}', [EventController::class, 'editEvent']);
    Route::get('events/delete/{id}',[EventController::class,'deleteEvent']);
    //Project Part
    Route::get('projects/create', [ProjectController::class, 'displayForm']);
    Route::post('projects/create', [ProjectController::class, 'createProject']);
    Route::get('projects/edit/{id}', [ProjectController::class, 'editForm']);
    Route::post('projects/edit/{id}', [ProjectController::class, 'editProject']);
    Route::get('projects/delete/{id}',[ProjectController::class,'deleteProject']);
    //Members Part
    Route::get('member',[MemberController::class,'getMember']);
    Route::get('members/edit/{id}', [MemberController::class, 'editForm']);
    Route::post('members/edit/{id}', [MemberController::class, 'editMember']);
    Route::get('members/delete/{id}',[MemberController::class,'deleteMember']);

    Route::view('/leave', 'leave');
    Route::get('/contact', [ContactController::class, 'showForm']);
    Route::post('/contact_mail', [ContactController::class, 'sendEmail2']);
});

Route::group(['middleware' => 'auth:member'], function () { 
    Route::get('home/member', [HomeController::class, 'home']);
    Route::get('dashboard', [MemberController::class, 'memberDashboard']);
    
});
Route::group(['middleware' => 'auth:citizen'], function () { 
    Route::get('home/citizen', [HomeController::class, 'home']);
});


