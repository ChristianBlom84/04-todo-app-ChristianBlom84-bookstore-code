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
        static::$db->query($query);
        static::$db->bind(':todo', $post['todoText']);
        static::$db->resultSet();
    }

    public static function updateTodo($post)
    {
        $query = <<<SQL
            UPDATE todos
            SET todo = :newTodo
            WHERE todo = :todo
            LIMIT 1;
SQL;
        static::$db->query($query);
        static::$db->bind(':todo', $post['updateTodo']);
        static::$db->bind(':newTodo', $post['todoText']);
        static::$db->resultSet();
    }

    public static function toggleTodo($post)
    {
        var_dump($post);
        $query = <<<SQL
            SELECT * FROM todos;
SQL;
        
        static::$db->query($query);
        $todos = static::$db->resultSet();
        foreach ($todos as $todo) {
            if ($todo['todo'] == $post['toggle']) {
                if ($todo['done'] == 0) {
                    $todoState = 1;
                } else {
                    $todoState = 0;
                }
            }
        }
        $query = <<<SQL
            UPDATE todos
            SET done = :newStatus
            WHERE todo = :todo
            LIMIT 1;
SQL;
        static::$db->query($query);
        static::$db->bind(':todo', $post['toggle']);
        static::$db->bind(':newStatus', $todoState);
        static::$db->resultSet();
    }
}
