<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'price','namespace' => 'App\Api\V1\Controllers'], function(Router $api) {
        $api->get('/', 'PriceController@get');
        $api->post('/update', 'PriceController@update');
        
    });
    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        
    });

});

