<?php

namespace App\Repositories;

use App\Interface\AccesCardInterface;
use App\Interface\AdvertInterface;
use App\Interface\ArtisanCatInterface;
use App\Interface\ArtisanGroupInterface;
use App\Interface\ArtisanInterface;
use App\Interface\EstateInterface;
use App\Interface\EstateStaffInterface;
use App\Interface\HouseHoldInterface;
use App\Interface\InstallmentInterface;
use App\Interface\ManagerInterface;
use App\Interface\PaymentInterface;
use App\Interface\PropertyInterface;
use App\Interface\PropertyTypeInterface;
use App\Interface\RFIDInterface;
use App\Interface\securityCompInterface;
use App\Interface\SecurityGuardInterface;
use App\Interface\SiteworkerInterface;
use App\Interface\UserInterface;
use App\Repositories\UserRepo;
use App\Repositories\ManagerRepo;

use App\Services\Userservice;
use Illuminate\Support\ServiceProvider;
// use App\Interfaces\OrderRepositoryInterface;
// use App\Repositories\OrderRepository;



class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(Userservice::class, UserRepo::class);
        $this->app->bind(UserInterface::class, UserRepo::class);
        $this->app->bind(ManagerInterface::class, ManagerRepo::class);
        $this->app->bind(securityCompInterface::class, securityCompRepo::class);
        $this->app->bind(AccesCardInterface::class, AccessCardRepo::class);
        $this->app->bind(AdvertInterface::class, AdvertRepo::class);
        $this->app->bind(ArtisanCatInterface::class, ArtisanCatRepo::class);
        $this->app->bind(ArtisanInterface::class, ArtisanRepo::class);
        $this->app->bind(ArtisanGroupInterface::class, ArtisanGroupRepo::class);
        $this->app->bind(EstateInterface::class, EstateRepo::class);
        $this->app->bind(HouseHoldInterface::class, HouseHoldRepo::class);
        $this->app->bind(PropertyInterface::class, PropertyRepo::class);
        $this->app->bind(PropertyTypeInterface::class, PropertyTypeRepo::class);
        $this->app->bind(RFIDInterface::class, RFIDRepo::class);
        $this->app->bind(EstateStaffInterface::class, EstateStaffRepo::class);
        $this->app->bind(SiteworkerInterface::class, SiteworkerRepo::class);
        $this->app->bind(SecurityGuardInterface::class, SecurityGuardRepo::class);
        $this->app->bind(InstallmentInterface::class, InstallmentRepo::class);
        $this->app->bind(PaymentInterface::class, PaymentRepo::class);









        // $this->app->bind(
        //     'App\Interface\UserInterface',
        //     'App\Repositories\UserRepo'
        // );
    }

   

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
