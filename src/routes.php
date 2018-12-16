<?php

$router->get('', 'TodoController@get');
$router->post('add', 'TodoController@postTodo');
$router->post('delete', 'TodoController@deleteTodo');
$router->get('books', 'IndexController@getBooks');
$router->get('books/{id}', 'IndexController@getBook');
