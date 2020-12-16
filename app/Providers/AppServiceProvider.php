<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Services\CandidateServiceInterface::class,
            \App\Services\CandidateService::class,
        );
        $this->app->singleton(
            \App\Services\ExamServiceInterface::class,
            \App\Services\ExamService::class,
        );
        $this->app->singleton(
            \App\Services\AnswerServiceInterface::class,
            \App\Services\AnswerService::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
