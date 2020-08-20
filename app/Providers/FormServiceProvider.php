<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('bsName', 'components.form.name', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsDescription', 'components.form.description', ['name', 'text' => null, 'value' => null]);
    }
}
