<?php

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

#$router->get('/', function () use ($router) {
#    return $router->app->version();
#});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('note',  ['uses' => 'API\NoteController@index']);
    $router->get('note/{id}', ['uses' => 'API\NoteController@show']);
    $router->post('note', ['uses' => 'API\NoteController@store']);
    $router->put('note/{id}', ['uses' => 'API\NoteController@update']);
    $router->delete('note/{id}', ['uses' => 'API\NoteController@destroy']);

    $router->get('/text', function () {return response()->json(["message " => "Hello world"], 200);});
  });
