<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/',function (){
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    // Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    // Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    // Route::post('/contacts/create', [ContactController::class, 'store'])->name('contacts.store');
    // Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    // Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    // Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    // Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::resources([
        'contacts'=> ContactController::class,
        'companies'=> CompanyController::class,
    ]);
    Route::get('/settings/profile',[ProfileController::class,'edit'])->name('settings.profile.edit');
    Route::put('/settings/profile',[ProfileController::class,'update'])->name('settings.profile.update');

    Route::get('/download', function () {
        return Storage::download('profile-picture-1.jpg','myprofile.jpg');
    });
});


Auth::routes(['verify' => true]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
