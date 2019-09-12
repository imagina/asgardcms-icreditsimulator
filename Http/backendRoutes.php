<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/icreditsimulator'], function (Router $router) {

    $router->bind('clientcredit', function ($id) {
        return app('Modules\ICreditSimulator\Repositories\ClientCreditRepository')->find($id);
    });
    $router->get('clientcredits', [
        'as' => 'admin.icreditsimulator.clientcredit.index',
        'uses' => 'ClientCreditController@index',
        'middleware' => 'can:icreditsimulator.clientcredits.index'
    ]);
    $router->get('clientcredits/create', [
        'as' => 'admin.icreditsimulator.clientcredit.create',
        'uses' => 'ClientCreditController@create',
        'middleware' => 'can:icreditsimulator.clientcredits.create'
    ]);
    $router->post('clientcredits', [
        'as' => 'admin.icreditsimulator.clientcredit.store',
        'uses' => 'ClientCreditController@store',
        'middleware' => 'can:icreditsimulator.clientcredits.create'
    ]);
    $router->get('clientcredits/{clientcredit}/edit', [
        'as' => 'admin.icreditsimulator.clientcredit.edit',
        'uses' => 'ClientCreditController@edit',
        'middleware' => 'can:icreditsimulator.clientcredits.edit'
    ]);
    $router->put('clientcredits/{clientcredit}', [
        'as' => 'admin.icreditsimulator.clientcredit.update',
        'uses' => 'ClientCreditController@update',
        'middleware' => 'can:icreditsimulator.clientcredits.edit'
    ]);
    $router->delete('clientcredits/{clientcredit}', [
        'as' => 'admin.icreditsimulator.clientcredit.destroy',
        'uses' => 'ClientCreditController@destroy',
        'middleware' => 'can:icreditsimulator.clientcredits.destroy'
    ]);
// append



});
