<?php

namespace Modules\Icreditsimulator\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Icreditsimulator\Events\Handlers\RegisterIcreditsimulatorSidebar;

class IcreditsimulatorServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIcreditsimulatorSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('clientcredits', array_dot(trans('icreditsimulator::clientcredits')));
            // append translations



        });
    }

    public function boot()
    {
        $this->publishConfig('Icreditsimulator', 'permissions');
        $this->publishConfig('Icreditsimulator', 'settings');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Icreditsimulator\Repositories\ClientCreditRepository',
            function () {
                $repository = new \Modules\Icreditsimulator\Repositories\Eloquent\EloquentClientCreditRepository(new \Modules\Icreditsimulator\Entities\ClientCredit());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icreditsimulator\Repositories\Cache\CacheClientCreditDecorator($repository);
            }
        );
// add bindings



    }
}
