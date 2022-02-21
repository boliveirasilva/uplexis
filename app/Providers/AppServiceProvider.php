<?php

namespace App\Providers;

use App\Actions\QuestCarDataSearch;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(QuestCarDataSearch::class, function () {
            return new QuestCarDataSearch(env('QUEST_BASE_URL'));
        });
    }
}
