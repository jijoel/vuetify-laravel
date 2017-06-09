<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ViewErrorBag;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->sendErrorsToJavascript();
    }

    private function sendErrorsToJavascript()
    {
        \View::composer('*', function ($view) {
            $errors = session()->get('errors')
                ?: new ViewErrorBag;

            \JavaScript::put([
                'errors' => $errors->toArray(),
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
