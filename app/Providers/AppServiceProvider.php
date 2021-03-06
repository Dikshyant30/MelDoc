<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserCrud\UserRepositoryInterface;
use App\Repositories\UserCrud\UserRepository;
use App\Repositories\HospitalCrud\HospitalRepositoryInterface;
use App\Repositories\HospitalCrud\HospitalRepository;
use App\Repositories\PatientCrud\PatientRepositoryInterface;
use App\Repositories\PatientCrud\PatientRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class,UserRepository::class);
        $this->app->singleton(HospitalRepositoryInterface::class,HospitalRepository::class);
        $this->app->singleton(PatientRepositoryInterface::class,PatientRepository::class);
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
