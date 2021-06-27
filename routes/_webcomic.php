<?php

$router->get('webcomics', [
    'uses' => 'WebcomicController@index'
]);

$router->post('webcomics', [
    'uses' => 'WebcomicController@store'
]);

$router->get('webcomics/{id}', [
    'uses' => 'WebcomicController@show'
]);

$router->patch('webcomics/{id}', [
    'uses' => 'WebcomicController@update'
]);

//$router->destroy('webcomics/{webcomic}', [
//    'uses' => 'WebcomicController@destroy'
//]);
