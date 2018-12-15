<?php

namespace Bookstore\Controllers;

use Bookstore\Models\TodoModel;

class TodoController extends AbstractController
{
    protected $post;
    protected $todoList;

    public function get()
    {
        $this->todoList = TodoModel::getTodoList();
        $this->view('index');
    }

    public function postTodo()
    {
        $this->post = $_POST;
        // var_dump($this->post);
        // var_dump($this->todoList);
        if (isset($_POST)) {
            TodoModel::addTodo($this->post);
        }
        $this->todoList = TodoModel::getTodoList();
        $this->view('index');
    }
}
