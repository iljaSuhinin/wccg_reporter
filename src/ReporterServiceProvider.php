<?php
namespace Packages\Reporter;

use Illuminate\Support\ServiceProvider;

final class ReporterServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        parent::__construct($app);

        $this->config = $this->app['config'];
    }

    public function boot()
    {
        $this->publishConfig();
        $this->registerRoutes();
    }

    public function register()
    {
        $this->registerConfig();
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('reporter.php'),
        ], 'reporter');
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php',
            'reporter'
        );
    }

    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }
}
