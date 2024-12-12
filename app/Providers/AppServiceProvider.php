<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SocialPostController;
use App\Http\Controllers\Admin\LessonHistoryController;
use App\Http\Controllers\Admin\SocialPostLikeController;
use App\Http\Controllers\Admin\SocialPostCommentController;

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
            ['prefix' => 'category', 'name' => 'category.', 'controller' => CategoryController::class],
            ['prefix' => 'user', 'name' => 'user.', 'controller' => UserController::class],
            ['prefix' => 'level', 'name' => 'level.', 'controller' => LevelController::class],
            ['prefix' => 'profile', 'name' => 'profile.', 'controller' => ProfileController::class],
            ['prefix' => 'social-post', 'name' => 'social-post.', 'controller' => SocialPostController::class],
            ['prefix' => 'lesson-history', 'name' => 'lesson-history.', 'controller' => LessonHistoryController::class],
            ['prefix' => 'lesson', 'name' => 'lesson.', 'controller' => LessonController::class],
            ['prefix' => 'social-post-like', 'name' => 'social-post-like.', 'controller' => SocialPostLikeController::class],
            ['prefix' => 'social-post-comment', 'name' => 'social-post-comment.', 'controller' => SocialPostCommentController::class],
        ]);
    }
}
