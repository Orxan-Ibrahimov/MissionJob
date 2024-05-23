<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureContoller;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PerspectiveController;
use App\Http\Controllers\PersperctiveController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\TaskTypeController;
use App\Http\Controllers\UserController;
use App\Mail\UserSigned;
use App\Models\StudentAttendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('auth/session');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::patch('/switch_role', function () {

    $user = User::find(Auth::user()->id);
    $user->update([
        'active_role' => request('role')
    ]);
    return redirect('home');
})->middleware('auth');

Route::get('/users/{user}/deleteRole/{role}', function (User $user, $role) {
    $user->removeRole($role);
    return redirect('users/' . $user->id);
})->middleware('auth');

Route::post('/users/{user}/addRole', function (User $user) {
    request()->validate([
        'role' => ['required'],
    ]);
    $user->assignRole(request('role'));
    return redirect('users/' . $user->id);
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

Route::resource('roles', RoleController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('groups', GroupController::class)->middleware('auth');
Route::resource('lessons', LessonController::class)->middleware('auth');
Route::resource('lectures', LectureContoller::class)->middleware('auth');
Route::resource('perspectives', PerspectiveController::class)->middleware('auth');
Route::resource('attendances', StudentAttendanceController::class)->middleware('auth');
Route::resource('tasktypes', TaskTypeController::class)->middleware('auth');
