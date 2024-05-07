<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Type\NumberInterface;
use Spatie\Permission\Contracts\Role;

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
});

Route::get('/users/{user}/deleteRole/{role}', function (User $user, $role) {
    $user->removeRole($role);
    return redirect('users/' . $user->id);
});

Route::get('/users/{user}/addRole/{role}', function (User $user, $role) {
   
    $user->assignRole($role);
    return redirect('users/' . $user->id);
});




// Route::get('/home', function ($request, $role) {
//     return view('home');
// });

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

// Route::get('/roles', [RoleController::class, 'index']);
// Route::get('/roles/create', [RoleController::class, 'create']);
// Route::post('/roles/create', [RoleController::class, 'store']);
// Route::get('/roles/edit/{role}', [RoleController::class, 'edit']);
// Route::patch('/roles/{role}', [RoleController::class, 'update']);
// Route::delete('/roles/{role}', [RoleController::class, 'destroy']);
