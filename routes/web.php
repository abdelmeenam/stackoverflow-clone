<?php

use App\Http\Controllers\AnswersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserProfile;
use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::group(['middleware'=>['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ,'prefix'=> LaravelLocalization::setLocale() ] , function () {

    // Tags
    Route::group(['middleware'=>'auth' , 'prefix' => 'tags', 'as' => 'tags.'], function () {
        Route::get('', [TagsController::class, 'index'])
            ->name('index');

        Route::get('/create', [TagsController::class, 'create'])
            ->name('create');

        Route::post('', [TagsController::class, 'store'])
            ->name('store');

        Route::get('/{tag_id}/edit', [TagsController::class, 'edit'])
            ->name('edit');

        Route::put('/{id}', [TagsController::class, 'update'])
            ->name('update');

        Route::delete('/{tag_id}', [TagsController::class, 'destroy'])
            ->name('destroy');
    });

    // Profile
    Route::group(['middleware'=>'auth' ,'prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [UserProfile::class, 'edit'])
            ->name('edit');

        Route::put('/', [UserProfile::class, 'update'])
            ->name('update');
    });

    // Answers
    Route::group(['middleware'=>'auth' ,'prefix' => 'answers', 'as' => 'answers.'], function () {

        Route::put('/{id}/best', [AnswersController::class, 'bestAnswer'])
            ->name('best');

        Route::post('/', [AnswersController::class, 'store'])
            ->name('store');
        Route::get('{answerId}/edit', [AnswersController::class, 'edit'])
            ->name('edit');
        Route::put('{answerId}', [AnswersController::class, 'update'])
            ->name('update');
        Route::delete('{answerId}', [AnswersController::class, 'destroy'])
            ->name('destroy');

    });

    // Questions
    Route::resource('questions', QuestionsController::class);

    // Notifications
    Route::get('/notifications', [NotificationsController::class, 'index'])
        ->name('notifications.index');
});











require __DIR__.'/auth.php';
