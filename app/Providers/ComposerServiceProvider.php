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
            $old = app('request')->old();
            $errors = session()->get('errors')
                ?: new ViewErrorBag;

            \JavaScript::put([
                'errors' => $errors->toArray(),
                'old' => $old,
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
