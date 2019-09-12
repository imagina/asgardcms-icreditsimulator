<?php

use Illuminate\Routing\Router;
$locale = LaravelLocalization::setLocale() ?: App::getLocale();

$router->get('simtest', ['as' => 'simtest', 'uses' => 'PublicController@test']);
$router->get('credit/{capital}/{days}', ['as' => 'icreditsimulator.index', 'uses' => 'PublicController@index']);
$router->get('calculate/{capital}/{days}', ['as' => 'icreditsimulator.calculate.interest', 'uses' => 'PublicController@calculateInterest']);
