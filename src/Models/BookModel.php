<?php

namespace Bookstore\Models;

class BookModel extends AbstractModel
{
    /**
     * This method constructs and executes the
     * SQL query to get all the books from the books table
     * and returns them
     *
     * @return array
     */
    public static function getBooks()
    {
        // An SQL query using HEREDOC syntax. You can use a string too!
        // The indentation may look broken here but don't try and fix it, it will break the query
        $query = <<<SQL
            SELECT * FROM books;
SQL;
        
        static::$db->query($query);
        $books = static::$db->resultset();
        return $books;
    }

    /**
     * This method constructs and exectures the
     * SQL query to get a book by a specific id from the books table
     * and returns that book.
     *
     * @param [array] $params - An array of parameters used in the SQL query.
     *                          This is set in the callAction method in the Router
     *                          as the last parameter.
     * @return array
     */
    public static function getBook($params)
    {
        $query = <<<SQL
        SELECT * FROM books WHERE id = :id;
SQL;
        static::$db->query($query);
        static::$db->bind(':id', $params['id']);
        $book = static::$db->result();

        return $book;
    }
}
