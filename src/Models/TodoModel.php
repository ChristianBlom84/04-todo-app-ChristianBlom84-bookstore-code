<?php

namespace Bookstore\Models;

class TodoModel extends AbstractModel
{
    public static function getTodoList()
    {
        $query = <<<SQL
            SELECT * FROM todos;
SQL;
        
        static::$db->query($query);
        $todos = static::$db->resultSet();
        return $todos;
    }

    public static function addTodo($post)
    {
        $query = <<<SQL
            INSERT INTO todos (todo)
            VALUES (:todo);
SQL;
        static::$db->query($query);
        static::$db->bind(':todo', $post['todocontent']);
        static::$db->resultSet();
    }
}
