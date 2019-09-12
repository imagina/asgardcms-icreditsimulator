<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/clientCredits'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $router->post('/', [
    'as' => 'api.icreditsimulator.client.credits.store',
    'uses' => 'ClientCreditApiController@create',
  ]);
  $router->post('/credit', [
    'as' => 'api.icreditsimulator.client.credits.credit.store',
    'uses' => 'ClientCreditApiController@creditStore',
  ]);
  $router->get('/{criteria}', [
    'as' => 'api.icreditsimulator.client.credits.show',
    'uses' => 'ClientCreditApiController@products',
  ]);
  $router->get('/', [
    'as' => 'api.icreditsimulator.client.credits.index',
    'uses' => 'ClientCreditApiController@index',
  ]);
  $router->put('/{criteria}', [
  'as' => 'api.icreditsimulator.client.credits.update',
    'uses' => 'ClientCreditApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => 'api.icreditsimulator.client.credits.delete',
    'uses' => 'ClientCreditApiController@delete',
  ]);

});
