<?php

namespace MILICO\Providers;

use Illuminate\Support\ServiceProvider;
use MILICO\Repositories\CategoriaRepository;
use MILICO\Repositories\CategoriaRepositoryEloquent;
use MILICO\Repositories\ClienteRepository;
use MILICO\Repositories\ClienteRepositoryEloquent;
use MILICO\Repositories\CupomRepository;
use MILICO\Repositories\CupomRepositoryEloquent;
use MILICO\Repositories\OrderRepository;
use MILICO\Repositories\OrderRepositoryEloquent;
use MILICO\Repositories\ProdutoRepository;
use MILICO\Repositories\ProdutoRepositoryEloquent;
use MILICO\Repositories\SabespRepository;
use MILICO\Repositories\SabespRepositoryEloquent;
use MILICO\Repositories\UserRepository;
use MILICO\Repositories\UserRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(SabespRepository::class,SabespRepositoryEloquent::class);
    }
}
