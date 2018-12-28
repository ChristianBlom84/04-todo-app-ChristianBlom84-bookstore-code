<?php

namespace Bookstore\Controllers;

use Bookstore\Models\BookModel;

class IndexController extends AbstractController
{
    public $books;
    public $book;

    /**
     * Action that is called when the "" route is triggered
     *
     * @return void
     */
    public function get()
    {
        $this->view('index');
    }

    /**
     * Action that is called when the "/books" route is triggered
     *
     * @return void
     */
    public function getBooks()
    {
        // Get all the books
        $this->books = BookModel::getBooks();
        $this->view('books');
    }

    /**
     * Action that is called when the "/books/{id}" route is triggered
     *
     * @return void
     */
    public function getBook($params)
    {
        // Get a specific book
        $this->book = BookModel::getBook($params);
        $this->view('book');
    }

    public function param($param)
    {
        echo "Welcome this is the test route with param!";
    }
}
