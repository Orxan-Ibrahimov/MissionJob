<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\User;
use App\Policies\GroupPolicy;
use App\Policies\LessonPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::policy(User::class,GroupPolicy::class);
        Gate::policy(Group::class, GroupPolicy::class);
        // Gate::policy(Group::class, LessonPolicy::class);
        Gate::policy(Lesson::class, LessonPolicy::class);
    }
}
