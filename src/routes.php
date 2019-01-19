<?php

$router->get('', 'TodoController@get');
$router->get('done', 'TodoController@getDone');
$router->get('in-progress', 'TodoController@getInProgress');
$router->post('create', 'TodoController@createTodo');
$router->post('delete', 'TodoController@deleteTodo');
$router->post('update', 'TodoController@updateTodo');
$router->post('toggle', 'TodoController@toggleTodo');
$router->post('toggle-all', 'TodoController@toggleAll');
$router->post('search', 'TodoController@searchTodo');
