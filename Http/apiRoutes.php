<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/icreditsimulator'/*,'middleware' => ['auth:api']*/], function (Router $router) {
//======   Client
  require('ApiRoutes/clientCreditRoutes.php');
  $router->get('calculate/{capital}/{days}', ['as' => 'icreditsimulator.calculate.interest', 'uses' => 'CreditSimulatorApiController@calculate']);
});
