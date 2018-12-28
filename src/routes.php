<?php

$router->get('', 'TodoController@get');
$router->post('add', 'TodoController@postTodo');
$router->post('delete', 'TodoController@deleteTodo');
$router->post('update', 'TodoController@updateTodo');
$router->post('toggle', 'TodoController@toggleTodo');
$router->get('books', 'IndexController@getBooks');
$router->get('books/{id}', 'IndexController@getBook');
