<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Repositories\PersonRepository;
use App\Services\Contracts\PersonServiceInterface;
use App\Services\PersonService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
