<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SocialPostCommentController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form');
});

Route::get('/user', function () {
    return view('form');
});


Route::prefix('admin')->name('admin.')->group(function () {
    $routes = [
        [
            'group' => 'User Management',
            'items' => [
                ['prefix' => 'user', 'name' => 'user.', 'controller' => UserController::class],
                ['prefix' => 'level', 'name' => 'level.', 'controller' => LevelController::class],
            ],
        ],
        [
            'group' => 'Category Management',
            'items' => [
                ['prefix' => 'category', 'name' => 'category.', 'controller' => CategoryController::class],
                ['prefix' => 'lesson', 'name' => 'lesson.', 'controller' => LessonController::class],
            ],
        ],
        [
            'group' => 'Social Post Management',
            'items' => [
                ['prefix' => 'social-post', 'name' => 'social-post.', 'controller' => SocialPostCommentController::class],
            ],
        ],
    ];
    foreach ($routes as $routeGroup) {
        foreach ($routeGroup['items'] as $route) { 
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
    }
});

