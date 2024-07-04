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

    public function boot(): void
    {
        $this->publishConfig();
        $this->registerRoutes();
    }

    public function register(): void
    {
        $this->registerConfig();
    }

    private function publishConfig(): void
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('reporter.php'),
        ], 'reporter');
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php',
            'reporter'
        );
    }

    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }
}
