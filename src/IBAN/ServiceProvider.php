<?php namespace IBAN;

use IBAN\Validation\IBANValidator;
use Illuminate\Support\Facades\Validator;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::resolver(function($translator, $data, $rules, $messages) {
            return new IBANValidator($translator, $data, $rules, $messages);
        });
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    private function registerBindings()
    {
        // Services
        $this->app->bind(\IBAN\Services\IBANService::class, \IBAN\Services\Implementation\IBANService::class);
    }

}
