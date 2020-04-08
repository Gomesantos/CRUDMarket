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

//cliente 
$router->get("/cliente","clienteController@getAll");

$router->group(['prefix' => "/cliente"],function() use ($router){

    $router->get("/{id}","clienteController@get");
    $router->post("/","clienteController@store");
    $router->put("/{id}","clienteController@update");
    $router->delete("/{id}","clienteController@destroy");

});

//funcionário
$router->get("/funcionario","funcionarioController@getAll");

$router->group(['prefix' => "/funcionario"],function() use ($router){

    $router->get("/{id}","funcionarioController@get");
    $router->post("/","funcionarioController@store");
    $router->put("/{id}","funcionarioController@update");
    $router->delete("/{id}","funcionarioController@destroy");
    
    $router->post("/login","funcionarioController@authenticate");

});

//produto
$router->get("/produto","produtoController@getAll");

$router->group(['prefix' => "/produto"],function() use ($router){

    $router->get("/{id}","produtoController@get");
    $router->post("/","produtoController@store");
    $router->put("/{id}","produtoController@update");
    $router->delete("/{id}","produtoController@destroy");

});

//venda
$router->get("/venda","vendaController@getAll");

$router->group(['prefix' => "/venda"],function() use ($router){

    $router->get("/{id}","vendaController@get");
    $router->post("/","vendaController@store");
    $router->put("/{id}","vendaController@update");
    $router->delete("/{id}","vendaController@destroy");

});

//listaprodutos
$router->get("/list","listaController@getAll");

$router->group(['prefix' => "/list"],function() use ($router){

    $router->get("/{id}","listaController@getbyvenda");
    $router->post("/","listaController@store");
    $router->put("/{id}","listaController@update");
    $router->delete("/{id}","listaController@destroy");

});