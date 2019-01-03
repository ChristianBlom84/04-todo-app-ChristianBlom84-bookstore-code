<?php

$router->get('', 'TodoController@get');
$router->get('done', 'TodoController@getDone');
$router->get('in-progress', 'TodoController@getInProgress');
$router->post('add', 'TodoController@postTodo');
$router->post('delete', 'TodoController@deleteTodo');
$router->post('update', 'TodoController@updateTodo');
$router->post('toggle', 'TodoController@toggleTodo');
$router->post('search', 'TodoController@searchTodo');
$router->get('books', 'IndexController@getBooks');
$router->get('books/{id}', 'IndexController@getBook');
