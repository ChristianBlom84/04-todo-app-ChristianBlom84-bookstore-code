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

    public function getDone()
    {
        $this->todoList = TodoModel::getTodoList();
        $this->view('done');
    }

    public function getInProgress()
    {
        $this->todoList = TodoModel::getTodoList();
        $this->view('in-progress');
    }

    public function createTodo()
    {
        $this->post = $_POST;
        if (!empty(trim($_POST['todocontent']))) {
            TodoModel::createTodo($this->post);
        }
        $this->redirect('/');
    }

    public function deleteTodo()
    {
        $this->post = $_POST;
        if (!empty($_POST)) {
            TodoModel::deleteTodo($this->post);
        }
        $this->redirect('/');
    }

    public function updateTodo()
    {
        $this->post = $_POST;
        if (!empty($_POST)) {
            TodoModel::updateTodo($this->post);
        }
        $this->redirect('/');
    }

    public function toggleTodo()
    {
        $this->post = $_POST;
        if (!empty($this->post)) {
            TodoModel::toggleTodo($this->post);
        }
        $this->redirect('/');
    }

    public function searchTodo()
    {
        $this->post = $_POST;
        if (!empty($this->post)) {
            $this->todoList = TodoModel::searchTodo($this->post);
        }
        $this->view('index');
    }
}
