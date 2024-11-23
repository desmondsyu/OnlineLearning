<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;
use App\Repositories\TaskRepository;
use App\Repositories\AnswerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CourseRepository::class, function ($app) {
            return new CourseRepository();
        });

        $this->app->bind(ModuleRepository::class, function ($app) {
            return new ModuleRepository();
        });

        $this->app->bind(TaskRepository::class, function ($app) {
            return new TaskRepository();
        });

        $this->app->bind(AnswerRepository::class, function ($app) {
            return new AnswerRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
