<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response('Unauthorized', 401);
});

$router->group(['middleware' => 'auth', 'prefix' => 'api'], function () use ($router) {

    $router->get('/', function () {
        return 'ok';
    });

    require ('_webcomic.php');

    $router->get('webcomics/{webcomic}/sources', [
        'uses' => 'SourceController@index'
    ]);

    $router->get('statistics', [
        'uses' => 'ReportController@statistics'
    ]);

    $router->get('statistics/{days}', [
        'uses' => 'ReportController@statistics'
    ]);
});
