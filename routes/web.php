<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SocialPostController;
use App\Http\Controllers\Admin\SocialPostCommentController;
use App\Http\Controllers\Admin\SocialPostLikeController;
use App\Http\Controllers\Admin\LessonHistoryController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form');
});

Route::get('/user', function () {
    return view('form');
});

Route::post('/social-posts/update-status', [SocialPostController::class, 'updateStatus']);


Route::prefix('admin')->name('admin.')->group(function () {
    $routes = [
        ['prefix' => 'category', 'name' => 'category.', 'controller' => CategoryController::class],
        ['prefix' => 'user', 'name' => 'user.', 'controller' => UserController::class],
        ['prefix' => 'level', 'name' => 'level.', 'controller' => LevelController::class],
        ['prefix' => 'profile', 'name' => 'profile.', 'controller' => ProfileController::class],
        ['prefix' => 'social-post', 'name' => 'social-post.', 'controller' => SocialPostController::class],
        ['prefix' => 'lesson-history', 'name' => 'lesson-history.', 'controller' => LessonHistoryController::class],
        ['prefix' => 'lesson', 'name' => 'lesson.', 'controller' => LessonController::class],
        ['prefix' => 'social-post-like', 'name' => 'social-post-like.', 'controller' => SocialPostLikeController::class],
        ['prefix' => 'social-post-comment', 'name' => 'social-post-comment.', 'controller' => SocialPostCommentController::class],
    ];

    foreach ($routes as $route) {
        Route::prefix($route['prefix'])
            ->name($route['name'])
            ->controller($route['controller'])
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
    }
});

