<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/genre/all', [GenreController::class, 'index'])->name('genre.index');
Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
Route::post('/genre/store', [GenreController::class, 'store'])->name('genre.store');
Route::get('/genre/destroy/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');

Route::get('/song/all', [SongController::class, 'index'])->name('song.index');
Route::get('/song/create', [SongController::class, 'create'])->name('song.create');
Route::post('/song/store', [SongController::class, 'store'])->name('song.store');
Route::get('/song/destroy/{song}', [SongController::class, 'destroy'])->name('song.destroy');
Route::get('/song/{id}', [SongController::class, 'show'])->name('song.show');

Route::get('/playlist/all', [PlaylistController::class, 'index'])->name('playlist.index')->middleware('auth');
Route::get('/playlist/create', [PlaylistController::class, 'create'])->name('playlist.create')->middleware('auth');
Route::post('/playlist/store', [PlaylistController::class, 'store'])->name('playlist.store')->middleware('auth');
Route::get('/playlist/{playlist}/destroy', [PlaylistController::class, 'destroy'])->name('playlist.destroy')->middleware('auth');

Route::get('/playlist/{playlist}', [PlaylistController::class, 'show'])->name('playlist.show');
Route::get('/playlist/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlist.edit');
Route::post('/playlist/{playlist}/update', [PlaylistController::class, 'update'])->name('playlist.update');

Route::post('/playlist/addSongs', [PlaylistController::class, 'addSongs'])->name('playlist.addSongs');
Route::get('/playlist/{playlist}/song/{song}/remove', [PlaylistController::class, 'removeSong'])->name('playlist.removeSong');

require __DIR__.'/auth.php';
