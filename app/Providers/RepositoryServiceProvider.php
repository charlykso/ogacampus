<?php

namespace App\Providers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\EventsRepositoryInterface;
use App\Interfaces\GiveawayRepositoryInterface;
use App\Interfaces\ItemsRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ProfileRepositoryInterface;
use App\Interfaces\ReportViewRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\SchoolRepositoryInterface;
use App\Interfaces\ServicesRepositoryInterface;
use App\Interfaces\ShopRepositoryInterface;
use App\Interfaces\StateRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VerificationRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CountryRepository;
use App\Repositories\EventsRepository;
use App\Repositories\GiveawayRepository;
use App\Repositories\ItemsRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\ReportViewRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\ShopRepository;
use App\Repositories\StateRepository;
use App\Repositories\UserRepository;
use App\Repositories\VerificationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
        $this->app->bind(ItemsRepositoryInterface::class, ItemsRepository::class);
        $this->app->bind(EventsRepositoryInterface::class, EventsRepository::class);
        $this->app->bind(ServicesRepositoryInterface::class, ServicesRepository::class);
        $this->app->bind(ReportViewRepositoryInterface::class, ReportViewRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(VerificationRepositoryInterface::class, VerificationRepository::class);
        $this->app->bind(GiveawayRepositoryInterface::class, GiveawayRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ShopRepositoryInterface::class, ShopRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
