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

    public static function deleteTodo($post)
    {
        $query = <<<SQL
            DELETE FROM todos
            WHERE todo = :todo
            LIMIT 1;
SQL;
        var_dump(key($post));
        static::$db->query($query);
        static::$db->bind(':todo', key($post));
        static::$db->resultSet();
    }
}
