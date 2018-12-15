<?php

$router->get('', 'TodoController@get');
$router->post('', 'TodoController@postTodo');
$router->get('books', 'IndexController@getBooks');
$router->get('books/{id}', 'IndexController@getBook');
