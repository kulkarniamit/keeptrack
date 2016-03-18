<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 3/17/16
 * Time: 11:48 AM
 */
namespace ServiceProviders;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Interfaces\\IUserRepository', 'Repositories\\UserRepository');
    }
}
?>
