<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\SocialPostController;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('routes', [
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
                'group' => 'Social Management',
                'items' => [
                    ['prefix' => 'social-post', 'name' => 'social-post.', 'controller' => SocialPostController::class],
                ],
            ],
        ]);
    }
}
