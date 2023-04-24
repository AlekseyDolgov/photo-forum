<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\RepliesController;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [ThreadsController::class, 'index']);

Route::get('threads/create', [ThreadsController::class, 'create']);
Route::get('threads/{channel}/{thread}', [ThreadsController::class, 'show']);
Route::delete('threads/{channel}/{thread}', [ThreadsController::class, 'destroy']);
Route::post('threads', [ThreadsController::class, 'store']);
Route::get('threads/{channel}', [ThreadsController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/threads/{channel}/{thread}/replies', [RepliesController::class, 'store']);
Route::delete('/replies/{reply}', [RepliesController::class, 'destroy']);

Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);

Route::get('/profiles/{id}', function ($id) {
    $profile = Profile::findOrFail($id);
    $user = DB::table('users')
        ->join('profile', 'users.id', '=', 'profile.user_id')
        ->select('users.*', 'profile.user_photo', 'profile.about_me', 'profile.last_vist', 'profile.photo_technic', 'profile.place_residence', 'profile.last_name', 'profile.patronymic')
        ->where('users.id', $profile->id)
        ->first();
    return view('profiles.show', compact('user'));
})->name('profiles.show');

// Для админов
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('channels/create', [ChannelsController::class, 'create']);
    Route::post('channels', [ChannelsController::class, 'store']);
    Route::delete('threads/{channel}/{thread}', [ThreadsController::class, 'destroy']);
});

require __DIR__.'/auth.php';
