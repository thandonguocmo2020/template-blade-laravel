<?php

namespace Hoanghiep\Template;

use Illuminate\Support\ServiceProvider;

class HoanghiepTemplateProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__ . '/config_blade.php' => config_path('hoanghiep.php'),
        ]);

        $this->publishes([
            __DIR__ . '/MakeViewCommand.php' => app_path('/Console/Commands/MakeViewCommand.php'),
        ]);

        $this->publishes([
            __DIR__ . '/blade' => base_path('/hoanghiep/blade'),
        ]);

        $this->publishes([
            __DIR__ . '/layouts' => resource_path('views/layouts'),
        ]);

        $this->publishes([
            __DIR__ . '/content-static' => resource_path('views/content-static'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        
    }

}
