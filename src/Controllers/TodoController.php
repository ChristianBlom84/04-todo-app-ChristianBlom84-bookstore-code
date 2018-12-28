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
        if (!empty($_POST['todocontent'])) {
            TodoModel::addTodo($this->post);
        }
        $this->todoList = TodoModel::getTodoList();
        $this->view('index');
    }

    public function deleteTodo()
    {
        $this->post = $_POST;
        if (!empty($_POST)) {
            TodoModel::deleteTodo($this->post);
        }
        $this->todoList = TodoModel::getTodoList();
        $this->view('index');
    }

    public function updateTodo()
    {
        $this->post = $_POST;
        if (!empty($_POST)) {
            TodoModel::updateTodo($this->post);
        }
        $this->todoList = TodoModel::getTodoList();
        $this->view('index');
    }

    public function toggleTodo()
    {
        $this->post = $_POST;
        if (!empty($this->post)) {
            TodoModel::toggleTodo($this->post);
        }
        $this->todoList = TodoModel::getTodoList();
        $this->view('index');
    }
}
