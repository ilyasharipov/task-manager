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
        \Form::component('bsStatus', 'components.form.status', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsAssigned', 'components.form.assigned', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsSubmit', 'components.form.submit', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsGender', 'components.form.gender', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsBirthday', 'components.form.birthday', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsEmail', 'components.form.email', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsPassword', 'components.form.password', ['name', 'text' => null, 'value' => null]);
        \Form::component('bsPassConf', 'components.form.pass_conf', ['name', 'text' => null, 'value' => null]);
    }
}
